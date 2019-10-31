<?php

namespace App\Http\Controllers;

use App\Models\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // all books
    public function index()
    {
        $files = FileEntry::all();
        return response()->json($files, 200);
    }

    // add book
    public function add(Request $request)
    {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

//        if(Storage::disk('uploads')->put($path.'/'.$filename,  $file)) {
        if(Storage::disk('uploads')->put('',  $file)) {
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

    // delete book
    public function delete($id)
    {
//        $book = Book::find($id);
//        $book->delete();

        return response()->json('The book successfully deleted');
    }

}
