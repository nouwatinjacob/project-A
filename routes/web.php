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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Main Routes for the Forum Start

Route::group(['middleware' => 'auth'], function(){

    Route::get('topic/create', 'ForumsController@create')->name('topic.create');

    Route::post('topic/store', 'ForumsController@store')->name('topic.store');

    Route::get('topic/category/{id}', 'ForumsController@getTopicsWithCategory')->name('topic.category');

    Route::get('topic/like/{id}', 'TopicsController@like')->name('topic.like');

    Route::get('topic/unlike/{id}', 'TopicsController@unlike')->name('topic.unlike');

    Route::get('reply/like/{id}', 'RepliesController@like')->name('reply.like');

    Route::get('reply/unlike/{id}', 'RepliesController@unlike')->name('reply.unlike');

});

Route::get('/', 'ForumsController@index')->name('forum');

Route::get('topic/{id}', 'ForumsController@show')->name('topic.show');

Route::get('results', function () {
        $topics = \App\Topic::where('title', 'like', '%'.request('query').'%')->paginate(3);
        $activePolls = \App\Poll::where('active', 1)->get();

        return view('/results')->with('topics', $topics)
                              ->with('categories', \App\Category::all())
                              ->with('polls', $activePolls)
                              ->with('query', request('query'));     
    });
    

// Main Routes for the Forum Start



// 

Route::group(['middleware' => 'auth'], function(){

Route::resource('topics', 'TopicsController');

Route::get('categories', 'CategoriesController@index')->name('categories');

Route::get('categories/create', 'CategoriesController@create')->name('categories.create');

Route::post('categories/store', 'CategoriesController@store')->name('categories.store');

Route::get('categories/destroy/{id}', 'CategoriesController@destroy')->name('categories.destroy');

Route::get('categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');

Route::post('categories/update/{id}', 'CategoriesController@update')->name('categories.update');

Route::post('topics/reply/{id}', 'RepliesController@store')->name('reply.store');

Route::get('topics/category/{id}', 'TopicsController@topicsWithCatId')->name('topics.category');

Route::get('polls', 'PollsController@index')->name('polls.index');

Route::get('polls/create', 'PollsController@create')->name('polls.create');

Route::post('polls/store', 'PollsController@store')->name('polls.store');

Route::get('polls/edit/{id}', 'PollsController@edit')->name('polls.edit');

Route::get('polls/items/{id}', 'PollsController@items')->name('items');

Route::get('polls/items/create/{id}', 'PollsController@createItems')->name('items.create');

Route::post('polls/items/store/{id}', 'PollsController@storeItem')->name('items.store');

Route::get('polls/items/delete/{id}', 'PollsController@deleteItem')->name('items.delete');

Route::get('polls/items/edit/{id}', 'PollsController@editItem')->name('items.edit');

Route::post('polls/items/update/{id}', 'PollsController@updateItem')->name('items.update');

Route::post('polls/vote', 'PollsController@vote')->name('polls.vote');

});