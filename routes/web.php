<?php

/*Route::get('{any}', function () {
    return view('book');
})->where('any', '.*');*/

/*Route::prefix('auth')->group(function () {
    Route::get('{any}', function () {
        return view('auth');
    })->where('any', '.*');
});*/

Route::prefix('auth')->group(function () {
    Route::get('/', function () {
        return view('auth');
    });
    Route::get('/{any}', function () {
        return view('auth');
    });
});

Route::prefix('book/')->group(function () {
    Route::get('/', function () {
        return view('book');
    });
    Route::get('/{any}', function () {
        return view('book');
    });
});
