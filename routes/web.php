<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;


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

Route::get('/login', 'App\Http\Controllers\UserController@login')->name('user.login');

Route::get('/premium', 'App\Http\Controllers\UserController@premium')->name('user.premium');

Route::get('/written/{user}', 'App\Http\Controllers\PostController@written')->name('user.written');


// Route::post('/tokens/create', function(Request $request){
//     $token = $request->user()->createToken($request->toke_name);

//     return ['token' => $token];
// });