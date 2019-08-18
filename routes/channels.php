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

Broadcast::channel('posts.{talk_id}.private', function () {
	return auth()->check();
});

Broadcast::channel('newquestions', function () {
	return true;
});
