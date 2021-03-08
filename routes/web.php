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

Route::get('/', 'App\Http\Controllers\PostController@index')->name('weblog.index');

Route::get('/create', 'App\Http\Controllers\PostController@create')
    ->middleware('auth')
    ->name('post.create');
Route::post('/create', 'App\Http\Controllers\PostController@store')
    ->middleware('auth')
    ->name('post.store');

Route::get('/post/{post}', 'App\Http\Controllers\PostController@get')
    ->name('post.get');

Route::post('/post/{post}', 'App\Http\Controllers\PostController@addComment')
    ->middleware('auth')
    ->name('post.addcomment');

Route::get('/post/edit/{post}', 'App\Http\Controllers\PostController@editPost')
    ->middleware('auth')
    ->name('post.edit');
Route::put('/post/edit/{post}', 'App\Http\Controllers\PostController@updatePost')
    ->middleware('auth')
    ->name('post.update');
Route::delete('/post/{post}', 'App\Http\Controllers\PostController@deletePost')
    ->middleware('auth')
    ->name('post.destroy');

Route::get('/category', 'App\Http\Controllers\CategoryController@get')->name('category.get');
Route::post('/category', 'App\Http\Controllers\CategoryController@create')
    ->middleware('auth')
    ->name('category.create');
Route::delete('/category/{category}', 'App\Http\Controllers\CategoryController@destroy')
    ->middleware('auth')
    ->name('category.destroy');
Route::get('/category/{category}/posts', 'App\Http\Controllers\CategoryController@getPostsByCategory')->name('category.posts');

Route::get('/premium', 'App\Http\Controllers\UserController@premium')
    ->middleware('auth')
    ->name('user.premium');

Route::get('/written', 'App\Http\Controllers\PostController@written')
    ->middleware('auth')
    ->name('user.written');

Route::get('/sendmail', 'App\Http\Controllers\MailController@sendDigest')->name('mail.senddigest');

Route::get('/digest', 'App\Http\Controllers\UserController@digest')->name('user.digest');
Route::get('/unsubscribe', 'App\Http\Controllers\UserController@unsubscribe')->name('user.unsubscribe');
Route::get('/subscribe', 'App\Http\Controllers\UserController@subscribe')->name('user.subscribe');

Route::get('/premiumsignon', 'App\Http\Controllers\UserController@premiumSignOn')->name('user.premiumsignon');

require __DIR__.'/auth.php';