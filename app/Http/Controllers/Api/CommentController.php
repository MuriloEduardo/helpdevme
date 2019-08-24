<?php

namespace App\Http\Controllers\Api;

use App\Talk;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events\PrivateCommentSent;
use App\Events\PrivatePostSent;
use App\Events\PrivateCreatedTalks;
use App\Notifications\QuestionCommented;

class CommentController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'body' => 'required',
			'type' => 'required',
			'receiver_id' => 'required',
			'question_id' => 'required'
		]);

		$talk = Talk::firstOrCreate([
			'user_id' => auth()->id(),
			'receiver_id' => $request->receiver_id,
			'question_id' => $request->question_id
		]);

		$this->authorize('store-comment', $talk);

		$post = Post::updateOrCreate(
			[
				'talk_id' => $talk->id,
				'user_id' => auth()->id(),
				'type' => $request->type
			],
			[
				'body' => $request->body,
				'budget' => $request->budget,
				'read_at' => null
			]
		);

		$post->load('talk');

		/**
		 * Dispara para o echo (resources/js/echo.js)
		 */
		broadcast(new PrivateCreatedTalks($post))->toOthers();
		broadcast(new PrivateCommentSent($post))->toOthers();
		broadcast(new PrivatePostSent($post))->toOthers();

		$post->talk->question->user->notify(new QuestionCommented($post));

		return response(['post' => $post]);
	}
}
