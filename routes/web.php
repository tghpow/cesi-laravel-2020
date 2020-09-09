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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', 'ContactController@get')->name('contact.get');
Route::post('/contact', 'ContactController@post')->name('contact.post');

Route::get('/mes-contacts', 'ContactController@myContacts')->name('contact.my_contacts');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostControlle@all')->name('post.all');
Route::get('/post/{id}', 'PostController@get')->name('post.get');
Route::post('/post', 'PostController@store')->name('post.store');
Route::put('/post/{id}', 'PostController@update')->name('post.update');
Route::delete('/post/{id}', 'PostController@delete')->name('post.delete');
