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

Auth::routes();

// Route::get('home', 'HomeController@index');
Route::post('votecontroller', 'VoteController@store');

// Route::get('/home', 'HomeController@store');
// Route::post('/home/store', 'HomeController@store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
