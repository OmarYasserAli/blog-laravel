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


Route::get('/', 'PostController@index')->name('post.index');

Route::post('/post/store', 'PostController@store')->name('post.store');
Route::post('/post/comment', 'PostController@comment')->name('post.comment');
Route::delete('/post/delete', 'PostController@delete')->name('post.delete');
Route::post('/post/like', 'PostController@likePostToggle')->name('post.like');
Route::post('/post/likedcheck', 'PostController@islikedByUser')->name('post.likedcheck');
Route::get('/post/{post}', 'PostController@show')->name('post.show');


Route::get('hashtag/{id}', 'HashtagController@index')->name('hash.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
