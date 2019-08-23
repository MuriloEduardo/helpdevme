<?php

namespace App\Events;

use App\Talk;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PrivateCreatedTalks implements ShouldBroadcastNow
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
		$this->talk = $talk->load('posts', 'user');
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		return new PrivateChannel('talks.user.' . $this->talk->receiver_id);
	}
}
