<?php




Route::get('/','HomeController@home')->name('home');
Route::get('/about','HomeController@about')->name('about');

Route::resource('/students','StudentController');

