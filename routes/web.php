<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\PostController@index')->name('weblog.index');

Route::get('/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/create', 'App\Http\Controllers\PostController@store')->name('post.store');

Route::get('/post/{post}', 'App\Http\Controllers\PostController@get')->name('post.get');

Route::post('/post/{post}', 'App\Http\Controllers\PostController@addComment')->name('post.addcomment');

Route::get('/post/edit/{post}', 'App\Http\Controllers\PostController@editPost')->name('post.edit');
Route::put('/post/edit/{post}', 'App\Http\Controllers\PostController@updatePost')->name('post.update');
Route::delete('/post/{post}', 'App\Http\Controllers\PostController@deletePost')->name('post.destroy');

Route::get('/category', 'App\Http\Controllers\CategoryController@get')->name('category.get');
Route::post('/category', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::delete('/category/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');
Route::get('/category/{category}/posts', 'App\Http\Controllers\CategoryController@getPostsByCategory')->name('category.posts');

Route::get('/premium', 'App\Http\Controllers\UserController@premium')->name('user.premium');

Route::get('/written', 'App\Http\Controllers\PostController@written')->name('user.written');

Route::get('/sendmail', 'App\Http\Controllers\MailController@sendDigest')->name('mail.senddigest');

require __DIR__.'/auth.php';