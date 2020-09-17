<?php

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'ContactController@index');
Route::post('/', 'ContactController@store');
Route::delete('/{id}', 'ContactController@destroy');
Route::get('/download/{id}', 'ContactController@download');



