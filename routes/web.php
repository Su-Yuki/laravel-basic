<?php

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

// ---[ hello ]--------------------------------------------------------------------
Route::get("hello",          "HelloController@index")->middleware("auth");

// auth
Route::get("hello/auth",     "HelloController@getAuth");
Route::post("hello/auth",    "HelloController@postAuth");

// rest
Route::get("hello/rest",     "HelloController@rest");

// session
Route::get("hello/session",  "HelloController@ses_get");
Route::post("hello/session", "HelloController@ses_put");


// ---[ rest ]---------------------------------------------------------------------
// resource
Route::resource('rest',      "RestappController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
