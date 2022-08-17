<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
//paper Routes 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/paper', 'PaperController@index')->name('paper');
Route::get('/paper/create', 'PaperController@create')->name('paper.create');
Route::put('/paper/store', 'PaperController@store')->name('paper.store');
Route::get('/paper/edit/{id}', 'PaperController@edit')->name('paper.edit');
Route::put('/paper/update/{id}', 'PaperController@update')->name('paper.update');
Route::get('/paper/destroy/{id}', 'PaperController@destroy')->name('paper.destroy');
Route::get('/paper/profile/show/{id}', 'ProfileController@show')->name('paper.profile.show');


//profile Routes 
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');


Auth::routes();
