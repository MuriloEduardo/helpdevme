<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Question;

class ViewQuestion
{
	use SerializesModels;

	public $question;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Question $question)
	{
		$this->question = $question;
	}
}
