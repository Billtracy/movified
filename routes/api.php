<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    // Route::get('email/verify/{id}', 'Api\VerifyController@verify')->name('verificationapi.verify');
    // Route::get('email/resend', 'Api\VerifyController@resend')->name('verificationapi.resend');
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function(){
    Route::post('getUser', 'Api\AuthController@getUser');
    Route::get('home', 'Api\HomeController@index');
    Route::post('vote', 'Api\HomeController@vote');
    Route::get('votable', 'Api\HomeController@votable');
});
});
   