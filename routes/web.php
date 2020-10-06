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

Route::post('post/{id}/comment', 'CommentController@store')->name('comment.store');
Route::get('mes-commentaires', 'CommentController@myComments')->name('comment.my');

Route::get('/posts', 'PostController@all')->name('post.all');
Route::get('/post/{id}', 'PostController@get')->name('post.get');
Route::get('/form-post/{id?}', 'PostController@form')->name('post.form');
Route::post('/post', 'PostController@store')->name('post.store');
Route::put('/post/{id}', 'PostController@update')->name('post.update')->middleware('is_post_owner');
Route::delete('/post/{id}', 'PostController@delete')->name('post.delete');
