<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

/**
 * Notifications
 */
Broadcast::channel('App.User.{id}', function ($user, $id) {
	return (int) $user->id === (int) $id;
});

/**
 * Presence
 */
Broadcast::channel('online', function ($user) {
	return $user;
});

/**
 * Private
 */
Broadcast::channel('comments', function () {
	return true;
});

Broadcast::channel('talks.user.{user_id}', function () {
	return auth()->check();
});

Broadcast::channel('posts.{talk_id}.private', function () {
	return auth()->check();
});

Broadcast::channel('newquestions', function () {
	return auth()->check();
});
