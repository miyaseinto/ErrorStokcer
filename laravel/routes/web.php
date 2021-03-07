<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});



Auth::routes();
Route::get('guest', 'App\Http\Controllers\Auth\LoginController@guestLogin')->name('login.guest');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/top', [App\Http\Controllers\TweetController::class, 'index'])->name('tweets.index');


    Route::get('/tweets/search', [App\Http\Controllers\TweetController::class, 'search'])->name('tweets.search');

    Route::resource('/users', 'App\Http\Controllers\UserController', ['only' => ['show']]);

    Route::resource('/tweets', 'App\Http\Controllers\TweetController', ['except' => ['index','edit','update','destroy ']]);
    Route::get('sample/member/{member_id?}', 'SampleController@member');
    Route::get('tweets/edit/{id}', 'App\Http\Controllers\TweetController@edit')->name('tweets.edit');
    Route::post('tweets/edit', 'App\Http\Controllers\TweetController@update')->name('tweets.update');
    Route::post('tweets/delete/{id}/{tag_id?}', 'App\Http\Controllers\TweetController@destroy')->name('tweets.destroy');


    Route::resource('/comments', 'App\Http\Controllers\CommentController' ,['except' => ['index','show','edit','update','destroy ']])->middleware('auth');
    Route::get('comments/edit/{id}', 'App\Http\Controllers\CommentController@edit')->name('comments.edit')->middleware('auth');
    Route::post('comments/edit', 'App\Http\Controllers\CommentController@update')->name('comments.update')->middleware('auth');
    Route::post('comments/delete/{id}', 'App\Http\Controllers\CommentController@destroy')->name('comments.destroy')->middleware('auth');
});