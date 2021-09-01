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

use App\Http\Controllers\ProductController;

Route::get('/index', 'App\Http\Controllers\ProductController@index');

Route::get('/index', 'App\Http\Controllers\ProductController@create');

Route::get('/index', 'App\Http\Controllers\ProductController@edit');

Route::get('/index', 'App\Http\Controllers\ProductController@show');

Route::get('/index', 'App\Http\Controllers\ProductController@index');

//Route::get('/index', ProductController::class . ':index');

// Route::get('/index', [ 'as' => 'index', 'ProductController' => 'ProductController@index']);

// Route::get('/', 'ProductController@create');
// Route::get('/index', 'pProductController@create');

