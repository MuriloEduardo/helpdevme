<?php

namespace App;

use App\Post;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $appends = [
		'published',
		'status_transform'
	];

	protected $fillable = [
		'title',
		'slug',
		'body',
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

	public function getStatusTransformAttribute($status)
	{
		if (is_null($status))
			$status = 0;

		switch ($status) {
			case 1:
				$class = 'badge-primary';
				break;
			case 2:
				$class = 'badge-info';
				break;
			case 3:
				$class = 'badge-success';
				break;
			default:
				$class = 'badge-warning';
				break;
		}

		return [
			'class' => $class,
			'text' => __('questions.status.' . $status)
		];
	}

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
}
