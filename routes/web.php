<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeblogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\WeblogController@index')->name('weblog.index');

Route::get('/create', 'App\Http\Controllers\WeblogController@create')->name('weblog.create');

Route::get('/login', 'App\Http\Controllers\WeblogController@login')->name('weblog.login');

Route::get('/premium', 'App\Http\Controllers\WeblogController@premium')->name('weblog.premium');

Route::get('/written', 'App\Http\Controllers\WeblogController@written')->name('weblog.written');
