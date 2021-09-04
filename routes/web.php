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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect('index');
});
Route::get('/home', function () {
    return redirect('index');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'create_content@index');
Route::get('/create_content', 'create_content@create_content');

Route::post('/index', 'create_content@index_content');
Route::post('/create_content', 'create_content@create_content_post');
Route::post('/set_day', 'create_content@set_day');

