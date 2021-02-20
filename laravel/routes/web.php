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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\TweetController::class, 'index'])->name('tweets.index');

Route::resource('/tweets', 'App\Http\Controllers\TweetController', ['except' => ['index','edit','update','delete']]);
Route::get('tweet/edit/{id}', 'App\Http\Controllers\TweetController@edit')->name('tweets.edit');
Route::post('tweets/edit', 'App\Http\Controllers\TweetController@update')->name('tweets.update');
Route::post('tweets/delete/{id}', 'App\Http\Controllers\TweetController@destroy')->name('tweets.destroy');