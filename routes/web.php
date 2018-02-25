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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topics', 'TopicsController');

Route::get('categories', 'CategoriesController@index')->name('categories');

Route::get('categories/create', 'CategoriesController@create')->name('categories.create');

Route::post('categories/store', 'CategoriesController@store')->name('categories.store');

Route::get('categories/destroy/{id}', 'CategoriesController@destroy')->name('categories.destroy');

Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');

Route::get('categories/update/{id}', 'CategoriesController@update')->name('categories.update');

Route::post('topics/reply/{id}', 'RepliesController@store')->name('reply.store');