<?php

use Illuminate\Support\Facades\Route;


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



Route::get('/','WelcomeController@welcome')->name('welcome'); 


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//school routes
Route::get('/school/home', 'SchoolController@home')->name('school.home');
Route::get('/school/completeProfile', 'SchoolController@complete_registration')->name('school.complete_registration');
Route::post('/school/complete_registration_handle', 'SchoolController@complete_registration_handle')->name('school.complete_registration_handle');
Route::get('/school/new_teacher', 'SchoolController@new_teacher')->name('school.new_teacher');
Route::post('/school/new_teacher_handle', 'SchoolController@new_teacher_handle')->name('school.new_teacher_handle');


// teacher controllers


Route::get('/teacher/home', 'TeacherController@home')->name('teacher.home');
Route::get('/teacher/my_students', 'TeacherController@students')->name('teacher.students');
Route::get('/teacher/complete Profile', 'TeacherController@complete_registration')->name('teacher.complete_registration');
Route::post('/teacher/complete_registration_handle', 'TeacherController@complete_registration_handle')->name('teacher.complete_registration_handle');
Route::get('/teacher/new_student', 'TeacherController@new_student')->name('teacher.new_student');
Route::post('/teacher/new_student_handle', 'TeacherController@new_student_handle')->name('teacher.new_student_handle');
Route::post('/teacher/new_student_handle_manual', 'TeacherController@new_student_handle')->name('teacher.new_student_handle_manual');
Route::get('/teacher/invite_parent/{student}', 'TeacherController@inviteParent')->name('teacher.inviteParent');
Route::post('/teacher/invite_parent_handle', 'TeacherController@inviteParentHandle')->name('teacher.inviteParentHandle');
Route::get('/teacher/viewStudent/{student}', 'TeacherController@studentView')->name('teacher.studentView');
Route::post('/teacher/editStudentAccount', 'TeacherController@editStudentAccount')->name('teacher.editStudentAccount');
Route::post('/teacher/editStudentProfile', 'TeacherController@editStudentProfile')->name('teacher.editStudentProfile');

Route::get('/teacher/deleteStudentParent/{parent}', 'TeacherController@deleteStudentParent')->name('teacher.deleteStudentParent');
Route::get('/teacher/deleteStudent/{student}', 'TeacherController@deleteStudent')->name('teacher.deleteStudent');

//student controllers

Route::get('/student/home', 'StudentController@home')->name('student.home');

Route::get('/student/favorite_book_handle/{book}', 'StudentController@favoriteBookHandle')->name('student.favoriteBookHandle');

Route::get('/student/favorite_books', 'StudentController@favoriteBook')->name('student.favoriteBook');

Route::get('/student/readBook/{book}', 'StudentController@readBook')->name('student.readBook');
Route::get('/student/books', 'StudentController@allBooks')->name('student.allBooks');

//subscribe routes


Route::get('/plans/subscription/{plan}', 'SubscriptionController@subscribe')->name('subscription.subscribe');

Route::post('/plans/subscriptionHandle', 'SubscriptionController@subscribeHandle')->name('subscription.subscribeHandle');

Route::get('/plans', 'SubscriptionController@plans')->name('subscription.plans');


//inviredPrent


Route::get('/invited_parent/home', 'invitedParentController@home')->name('invitedParent.home');


Route::get('/invited_parent/my-kid', 'invitedParentController@myKid')->name('invitedParent.myKid');
Route::get('/invited_parent/complete_profile', 'invitedController@complete_registration')->name('invited.complete_registration');
Route::post('/invited_parent/complete_registration_handle', 'invitedParentController@complete_registration_handle')->name('invitedParent.complete_registration_handle');


///messanger


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


///quizzer


Route::get('/Quiz/{book}', 'QuizzerController@home')->name('quizzer.home');
//Route::get('/Quiz/question', 'QuizzerController@question')->name('quizzer.question');
Route::post('/Quiz/question_handle', 'QuizzerController@question_handle')->name('quizzer.question_handle');
Route::post('/Quiz/final_handle', 'QuizzerController@final_handle')->name('quizzer.final_handle');
Route::post('/Quiz/final', 'QuizzerController@final')->name('quizzer.final');
Route::get('/Quiz/review/{book}', 'QuizzerController@review')->name('quizzer.review');
Route::get('quiz/my-quizzes', 'QuizzerController@studentQuizzes')->name('quizzer.studentQuizzes');
Route::get('/Quiz/questions/{book}', 'QuizzerController@question')->name('quizzer.question');


//// accounts

//$user_type=Auth::user()->userable_type;
//if($userable_type=="App\Student"){

   // $userable_type="student";   
//}
//else{

   // $userable_type="user";   
//};
Route::get('/accounts/profile', 'AccountsController@profile')->name('accounts.profile');
//Route::post('/accounts/editProfile','AccountsController@edit')->name('accounts.editProfile');
Route::post('/accounts/editProfile', 'AccountsController@edit')->name('accounts.editProfile');
Route::get('/accounts/changeAvatar', 'AccountsController@changeAvatar')->name('accounts.changeAvatar');
Route::get('/accounts/changePesonalInfo', 'AccountsController@changePesonalInfo')->name('accounts.changePesonalInfo');

/// parent 

Route::get('/parent/home', 'ParentController@home')->name('parent.home');


