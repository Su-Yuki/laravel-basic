<?php

use App\Http\Middleware\HelloMiddleware;

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
  return view('welcome');
});

// section1
Route::get("hello", "HelloController@index");
Route::get("hello/other", "HelloController@other");
Route::get("hello/request", "HelloController@request");

// section2
Route::get("hello/index/{id?}", "HelloController@helloIndex");
Route::get("hello/index2", "HelloController@index2");
Route::post("hello/post", "HelloController@post");

// section3
Route::get("hello/index3", "HelloController@index3")->middleware("helo");
Route::get("hello/index4", "HelloController@index4")->middleware("helo");
Route::post("hello/index4", "HelloController@post_validate");

Route::get("hello/index5", "HelloController@index5")->middleware("helo");
Route::post("hello/index5", "HelloController@post_validate2");
