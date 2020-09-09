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