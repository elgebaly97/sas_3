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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/




Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function() {
    Route::post('register-student', 'AuthController@registerStudent');
    Route::post('login-student', 'AuthController@loginStudent');

    Route::post('register-professor', 'AuthController@registerProfessor');
    Route::post('login-professor', 'AuthController@loginProfessor');

    Route::get('get-students', 'ApiController@students');

    Route::get('subjects', 'ApiController@subjects');
    Route::get('assignments', 'ApiController@assignments');
    Route::get('sources', 'ApiController@sources');
    Route::get('marks', 'ApiController@marks');
    Route::get('events', 'ApiController@events');
    Route::get('tables', 'ApiController@tables');
    Route::get('result', 'ApiController@result');
    Route::get('grade', 'ApiController@grade');






    Route::group(['middleware' => 'auth:student-api'],function()
    {
        Route::post('profile', 'AuthController@profileStudent');



    });

});
 // test something
