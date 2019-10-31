<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class BookController extends Controller
{
    // all books
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    // add book
    public function add(Request $request)
    {
        $book = new Book([
            'name' => $request->input('name'),
            'author' => $request->input('author')
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }

    // edit book
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    // update book
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('The book successfully updated');
    }

    // delete book
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('The book successfully deleted');
    }

    public function fileList() {
        $files = FileEntry::all();
        return response()->json($files, 200);
    }

    public function uploadFile(Request $request) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($filename,  $file)) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getSize();
            $file = FileEntry::create($input);

            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
