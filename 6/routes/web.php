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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    
    return view('auth/login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::get('/sns', 'Auth\snsController@snsPage');
Route::post('/sns', 'Auth\snsController@postsns');
Route::post('/sns{id}','Auth\snsController@destroy')->name('posts.destroy');