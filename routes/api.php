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


// make it comment for heroku

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/





Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function() {
    Route::post('register-student', 'AuthController@registerStudent');
    Route::post('login-student', 'AuthController@loginStudent');

    Route::post('register-professor', 'AuthController@registerProfessor');
    Route::post('login-professor', 'AuthController@loginProfessor');
    //Route::post('profile-professor', 'AuthController@profileProfessor');

    Route::get('get-students', 'ApiController@students');

    Route::get('subjects', 'ApiController@subjects');
    Route::get('assignments', 'ApiController@assignments');
    Route::get('sources', 'ApiController@sources');
    Route::get('marks', 'ApiController@marks');
    Route::get('events', 'ApiController@events');
    Route::get('tables', 'ApiController@tables');
    Route::get('result', 'ApiController@result');
    Route::get('grade', 'ApiController@grade');

    Route::get('departments', 'ApiController@departments');
    Route::get('grades', 'ApiController@grades');

    Route::get('all-departments', 'ApiController@allDepartments');
    Route::get('all-grades', 'ApiController@allGrades');
    Route::get('students-by-grade', 'ApiController@studentsByGrade');







    Route::group(['middleware' => 'auth:student-api'],function()
    {
        Route::post('profile', 'AuthController@profileStudent');
        Route::get('posts', 'ApiController@posts');
        Route::post('make-post', 'ApiController@makePost');
        Route::post('make-comment', 'ApiController@makeComment');
        Route::post('make-reply', 'ApiController@makeReply');
        Route::post('posts/{post}', 'ApiController@post');
        //Route::post('posts/{post}/comments', 'ApiController@comments');
        Route::post('comments', 'ApiController@comments');
        Route::post('replies', 'ApiController@replies');



    });


    Route::group(['middleware' => 'auth:professor-api'],function()
    {

        Route::post('add-source', 'ApiController@addSource');
        Route::post('add-assignment', 'ApiController@addAssignment');
        Route::post('add-mark', 'ApiController@addMarks');

        Route::get('student-grade', 'ApiController@studentsGrade');

        Route::post('profile-professor', 'AuthController@profileProfessor');
        Route::get('assigns', 'ApiController@assignProf');
        Route::get('source-prof', 'ApiController@sourceProf');




    });

});
 // test something
