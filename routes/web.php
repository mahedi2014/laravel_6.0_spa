<?php

/*Route::get('{any}', function () {
    return view('book');
})->where('any', '.*');*/

Route::get('', function () {
    echo 'this is home page';
    return;
});

Route::get('book', function () {
    return view('book');
    return;
});
Route::get('book/{any}', function () {
    return view('book');
})->where('any', '.*');


Route::get('auth', function () {
    echo 'this is auth home page';
    return;
});
Route::get('auth/{any}', function () {
    return view('auth');
})->where('any', '.*');



