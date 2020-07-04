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

Route::get('/', 'BlogController@index');
Route::get('blog/{category}/posts', ['as' => 'blog.posts', 'uses' => 'BlogController@posts']);
Route::get('blog/{post}/post', ['as' => 'blog.post', 'uses' => 'BlogController@post']);

Route::group(['middleware' => 'auth'], function(){
	Route::resource('category', 'CategoryController')->except(['destroy'], ['show']);
	Route::resource('post', 'PostController')->except(['destroy'], ['show']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


