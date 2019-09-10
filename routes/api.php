<?php

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

Route::resource('posts', 'Api\PostController');

Route::resource('comments', 'Api\CommentController');

Route::resource('tags', 'Api\TagController');

Route::resource('questions', 'Api\QuestionController');
Route::patch('questions/vote/{question_id}', 'Api\QuestionController@vote');
Route::post('questions/upload-images', 'Api\QuestionController@uploadImages');

Route::resource('talks', 'Api\TalkController');
Route::get('talks/all-read', 'Api\TalkController@markAllAsRead')->name('talks.allread');
Route::post('talks/upload-images', 'Api\TalkController@uploadImages');

Route::get('user', 'Api\UserController@current');

Route::get('notifications', 'Api\NotificationController@index');
Route::get('notifications/{id}', 'Api\NotificationController@show');
Route::get('notifications-all-read', 'Api\NotificationController@markAllAsRead');
