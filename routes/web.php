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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('register', 'AdminController@create')->name('admin.register');
    Route::post('register', 'AdminController@store')->name('admin.register.store');
    Route::get('login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

});

Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student.dashboard');
    Route::get('dashboard', 'StudentController@index')->name('student.dashboard');
    Route::get('register', 'StudentController@create')->name('student.register');
    Route::post('register', 'StudentController@store')->name('student.register.store');
    Route::get('login', 'Auth\StudentLoginController@login')->name('student.auth.login');
    Route::post('login', 'Auth\StudentLoginController@loginStudent')->name('student.auth.loginStudent');
    Route::post('logout', 'Auth\StudentLoginController@logout')->name('student.auth.logout');

});

Route::prefix('professor')->group(function () {
    Route::get('/', 'ProfessorController@index')->name('professor.dashboard');
    Route::get('dashboard', 'ProfessorController@index')->name('professor.dashboard');
    Route::get('register', 'ProfessorController@create')->name('professor.register');
    Route::post('register', 'ProfessorController@store')->name('professor.register.store');
    Route::get('login', 'Auth\ProfessorLoginController@login')->name('professor.auth.login');
    Route::post('login', 'Auth\ProfessorLoginController@loginProfessor')->name('professor.auth.loginProfessor');
    Route::post('logout', 'Auth\ProfessorLoginController@logout')->name('professor.auth.logout');

});