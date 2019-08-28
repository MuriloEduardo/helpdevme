<?php

namespace App\Listeners;

use App\Events\ViewQuestion;

class SetViewQuestion
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ViewQuestion  $event
	 * @return void
	 */
	public function handle(ViewQuestion $event)
	{
		$event->question->views()->updateOrCreate([
			'visitor' => \Request::ip(),
			'user_id' => auth()->id()
		]);
	}
}
