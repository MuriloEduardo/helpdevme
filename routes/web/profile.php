<?php

Route::prefix('profile')->group(function () {
	Route::get('/', 'ProfileController@infos')->name('profile.infos');

	Route::get('/password', 'ProfileController@password')->name('profile.password');

	Route::get('/notifications', 'ProfileController@notifications')->name('profile.notifications');

	Route::match(['put', 'patch'], '/{id}', 'ProfileController@update')->name('profile.update');

	Route::get('/sendEmailVerificationNotification', function () {
		$user = auth()->user();
		$user->sendEmailVerificationNotification();

		return back()->with('success', 'Email enviado!');
	})->middleware('auth')->name('profile.sendEmailVerificationNotification');
});
