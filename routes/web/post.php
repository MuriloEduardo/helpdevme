<?php

Route::resource('posts', 'PostController');

Route::get('posts/refused/{post}', 'PostController@refused')->name('posts.refused');
