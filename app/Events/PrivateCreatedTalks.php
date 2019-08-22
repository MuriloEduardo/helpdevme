<?php

namespace App\Events;

use App\Talk;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrivateCreatedTalks implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $talk;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Talk $talk)
	{
		$this->talk = $talk;
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		$opposite = auth()->id() === $this->talk->user->id ? $this->talk->receiver : $this->talk->user;

		return new PrivateChannel('talks.user' . $opposite->id);
	}
}
