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

Auth::routes(['verify' => true]);

Route::view('/', 'site')->name('index');

Route::resource('talks', 'TalkController');

Route::resource('users', 'UserController');

Route::resource('tags', 'TagController');

Route::get('activities/client', 'ActivityController@client')->name('activities.client');

Route::get('activities/freelancer', 'ActivityController@freelancer')->name('activities.freelancer');

Route::view('/dashboard', 'dashboard')->name('dashboard');
