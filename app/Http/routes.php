<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('auth/login');
});

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('logger/{meeting_id}', 'MeetingController@logger');
Route::post('/log/{id}', 'MeetingController@log');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'MeetingController@dashboard');
    Route::resource('meeting','MeetingController');
    Route::post('/meetingCreationTool', 'MeetingController@meetingCreationTool');
});
