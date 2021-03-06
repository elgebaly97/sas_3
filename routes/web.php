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

// make it comment for heroku

/*Route::get('/', function () {
    return view('welcome');
})->name('whome');*/




Auth::routes();
/*
Route::get('/', 'HomeController@index')->name('home');
*/


/* -----------------ROUTE FOR ADMIN----------  */

Route::get('admin/register', 'AdminController@create')->name('admin.register');
Route::post('admin/register', 'AdminController@store')->name('admin.register.store');
Route::get('admin/login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
Route::post('admin/login', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
//Route::get('admin/view-students', 'AdminController@viewStudents')->name('students');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    //Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
    Route::get('view-students', 'AdminController@viewStudents')->name('students');
    Route::post('view-students', 'AdminController@viewStudents')->name('students');
    Route::get('view-professors', 'AdminController@viewProfessors')->name('professors');
    Route::post('view-professors', 'AdminController@viewProfessors')->name('professors');
    Route::get('view-events', 'AdminController@viewEvents')->name('events');
    Route::post('view-events', 'AdminController@viewEvents')->name('events');
    Route::get('add-student', 'AdminController@addStudent')->name('add-student');
    Route::get('add-professor', 'AdminController@addProfessor')->name('add-professor');
    Route::get('add-event', 'AdminController@addEvent')->name('add-event');
    Route::post('store-student', 'AdminController@storeStudent')->name('store-student');
    Route::post('store-professor', 'AdminController@storeProfessor')->name('store-professor');
    Route::post('store-event', 'AdminController@storeEvent')->name('store-event');





});


/* -----------------ROUTE FOR STUDENTS----------  */
//Route::any ( 'search','SearchController@search')->name('search');
Route::get('student/register', 'StudentController@create')->name('student.register');
Route::post('student/register', 'StudentController@store')->name('student.register.store');
Route::get('student/login', 'Auth\StudentLoginController@login')->name('student.auth.login');
Route::post('student/login', 'Auth\StudentLoginController@loginStudent')->name('student.auth.loginStudent');

Route::middleware(['auth:student'])->prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student.dashboard');
    Route::get('dashboard', 'StudentController@index')->name('student.dashboard');
    Route::post('logout', 'Auth\StudentLoginController@logout')->name('student.auth.logout');
    Route::get('group', 'GroupController@index')->name('student.group');
    //Route::get('group','PostController@index');
    Route::post('group/posts','PostController@store');
    Route::post('group/posts/{post?}/comments','PostCommentsController@store');
    Route::post('group/posts/{post}/comments/{comment}','CommentRepliesController@store');
    //Route::get('subjects', function(){return view('./student/subjects');})->name('student.subjects');
    Route::get('assignments', 'AssignmentController@index')->name('student.assignments');
    //Route::get('tables', function(){return view('./student/tables');})->name('student.tables');
    Route::get('events', 'EventController@index')->name('student.events');
    Route::get('subject','SubjectController@index')->name('subject');
    Route::get('subject/{subject}','SubjectController@show')->name('student.subject');
    Route::any ( 'search','SearchController@search')->name('search');
    Route::any ( 'searchprof','SearchController@searchProf')->name('searchprof');
    Route::get ( 'chat','ChatController@index')->name('chat');
//    Route::get('group/test', function(){
//        $notifications=auth()->user()->unreadNotifications;
//        foreach ($notifications as $notification){
//            dd($notification->data['user']['name']);
//        }
//    });
    /*Route::get('markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
    });*/


});

/*Route::get('/public/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
});*/


/* -----------------ROUTE FOR PROFESSORS----------  */

Route::get('professor/register', 'ProfessorController@create')->name('professor.register');
Route::post('professor/register', 'ProfessorController@store')->name('professor.register.store');
Route::get('professor/login', 'Auth\ProfessorLoginController@login')->name('professor.auth.login');
Route::post('professor/login', 'Auth\ProfessorLoginController@loginProfessor')->name('professor.auth.loginProfessor');

Route::middleware(['auth:professor'])->prefix('professor')->group(function () {
    Route::get('/', 'ProfessorController@index')->name('professor.dashboard');
    Route::get('dashboard', 'ProfessorController@index')->name('professor.dashboard');
    Route::post('logout', 'Auth\ProfessorLoginController@logout')->name('professor.auth.logout');
    Route::get('groups/{group}', 'ProfessorGroupController@show');
    Route::post('{groups}/posts','PostController@storeProf');
    Route::post('groups/{group}/posts/{post?}/comments','PostCommentsController@store');
    Route::post('groups/{group}/posts/{post}/comments/{comment}','CommentRepliesController@store');
    Route::get('events', 'EventController@eventProf')->name('professor.events');
    Route::get('marks','ProfessorMarksController@index')->name('professor.marks');
    Route::post('students-marks', 'ProfessorMarksController@viewStudents')->name('add.marks');
    //Route::post('mark', 'ProfessorMarksController@saveMarks');
    Route::get('subject','SubjectController@index')->name('subject');
    Route::get('subject/{subject}','SubjectController@subjectProf')->name('professor.subject');
    Route::get('subject/{subject}/add-assignment','SubjectController@addAssignment')->name('add.assignments');
    Route::post('subject/{subject}/assignment', 'SubjectController@storeAssignment');
    Route::get('subject/{subject}/add-source','SubjectController@addSource')->name('add.sources');
    Route::post('subject/{subject}/source', 'SubjectController@storeSource');
    Route::get('subject/{subject}/add-mark','SubjectController@addMark')->name('add.marks');
    Route::post('subject/{subject}/mark', 'SubjectController@storeMark');
    /*Route::get('subject/{subject}/marks/{mark}/edit', 'SubjectController@editMark')->name('edit.marks');*/

});
