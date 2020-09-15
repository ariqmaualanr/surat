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

Route::get('about','PagesController@about');
Route::get('homepage', 'PagesController@homepage');
Auth::routes(['register' => true]);
Route::resource('anak', 'AnakController');

//route anak
Route:: get('anak','AnakController@index');
Route:: get('anak/create','AnakController@create');
Route:: get('anak/{anak}', 'AnakController@show');
Route:: post('anak', 'AnakController@store');
Route:: get('anak/{anak}/edit', 'AnakController@edit');
Route:: patch('anak/{anak}', 'AnakController@update');
Route:: delete('anak/{anak}', 'AnakController@destroy');



