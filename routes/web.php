<?php

Route::get('/', 'ContactController@index')->name('contact');
Route::post('/store', 'ContactController@store')->name('store');

Route::post('/send-mail', 'ContactController@sendMail')->name('send-mail');



