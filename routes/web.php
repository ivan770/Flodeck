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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('post')->group(function () {
    Route::post('new', 'PostController@Create')->name('create');
    Route::post('upvote', 'PostController@UpvoteToggle')->name('upvote');
    Route::get('search', 'SearchController@Search')->name('search');
});

Route::get('profile', 'SearchController@User')->name('profile');

Route::get('iframe', 'IFrameController@index')->name('iframe');
