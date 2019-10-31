<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'book'], function () {
    Route::get('/', 'BookController@index');
    Route::post('/add', 'BookController@add');
    Route::get('/edit/{id}', 'BookController@edit');
    Route::put('/update/{id}', 'BookController@update');
    Route::delete('/delete/{id}', 'BookController@delete');
    Route::get('/files', 'BookController@fileList');
    Route::post('/upload', 'BookController@uploadFile');
});

Route::group(['prefix' => 'file'], function () {
    Route::get('/', 'FileController@index');
    Route::post('/add', 'FileController@add');
});
