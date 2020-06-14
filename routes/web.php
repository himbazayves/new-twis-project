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

//student controllers

Route::get('/student/home', 'StudentController@home')->name('student.home');

Route::get('/student/readBook/{book}', 'StudentController@readBook')->name('student.readBook');

//subscribe routes


Route::get('/plans/subscription/{plan}', 'SubscriptionController@subscribe')->name('subscription.subscribe');

Route::post('/plans/subscriptionHandle', 'SubscriptionController@subscribeHandle')->name('subscription.subscribeHandle');

Route::get('/plans', 'SubscriptionController@plans')->name('subscription.plans');


//inviredPrent


Route::get('/invited_parent/home', 'invitedParentController@home')->name('invitedParent.home');
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