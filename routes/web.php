<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/{id}', 'HomeController@show')->name('show');
Route::get('/profile/{advert}/edit', 'AdvertController@edit')->name('profile.edit');

Route::put('/profile/{advert}/', 'AdvertController@update')->name('profile.update');

Route::delete('/profile/{advert}/', 'AdvertController@destroy')->name('profile.destroy');

Route::resource('/profile', 'AdvertController');





