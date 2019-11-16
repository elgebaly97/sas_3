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

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function() {
    Route::post('register-student', 'AuthController@registerStudent');
    Route::post('login-student', 'AuthController@loginStudent');

    Route::post('register-professor', 'AuthController@registerProfessor');
    Route::post('login-professor', 'AuthController@loginProfessor');

    Route::get('get-students', 'ApiController@students');
});
 // test something
