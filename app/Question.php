<?php

namespace App;

use App\Post;
use App\User;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $appends = [
		'published',
		'status_transform',
		'image_url'
	];

	protected $fillable = [
		'title',
		'slug',
		'body',
		'budget',
		'user_id',
		'status',
		'user_ended',
		'freelancer_ended'
	];

	const status = [
		'analyzing' => 0,
		'warranty' => 1,
		'payment' => 2,
		'finalized' => 3
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function getStatusTransformAttribute()
	{
		$response = [
			'class' => 'badge-secondary',
			'icon' => 'fas fa-briefcase-medical',
			'text' => __('questions.status.0'),
		];

		switch ($this->status) {
			case 1:
				$response = [
					'class' => 'badge-primary',
					'icon' => 'fas fa-address-card',
					'text' => __('questions.status.' . $this->status),
				];
				break;
			case 2:
				$response = [
					'class' => 'badge-info',
					'icon' => 'fas fa-money-bill-wave',
					'text' => __('questions.status.' . $this->status),
				];
				break;
			case 3:
				$response = [
					'class' => 'badge-success',
					'icon' => 'fas fa-clipboard-check',
					'text' => __('questions.status.' . $this->status),
				];
				break;
		}

		return $response;
	}

	public function getImageUrlAttribute()
	{ }

	public function getPublishedAttribute()
	{
		return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function talks()
	{
		return $this->hasMany('App\Talk');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	public function posts()
	{
		return $this->hasManyThrough('App\Post', 'App\Talk');
	}

	public function comments()
	{
		return $this->hasManyThrough('App\Post', 'App\Talk')
			->with(['user', 'talk'])
			->where('type', Post::types['comment']);
	}

	public function votes()
	{
		return $this->hasMany('App\Vote')
			->where('vote', 1);
	}

	public function views()
	{
		return $this->hasMany('App\View');
	}

	public function answerCandidates()
	{
		$candidates = User::where('id', '!=', auth()->id())
			->with('tags')
			->whereHas('tags', function($q) {
				$tags = $this->tags->pluck('id')->toArray();
				$q->whereIn('id', $tags);
			})
			->get();

		return $candidates;
	}
}
