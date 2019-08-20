<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
	protected $appends = ['published'];

	const status = [
		'active' => 0,
		'inactive' => 1
	];

	protected $fillable = [
		'user_id',
		'question_id',
		'receiver_id'
	];

	public function getPublishedAttribute()
	{
		return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']))->diffForHumans();
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function question()
	{
		return $this->belongsTo('App\Question');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function receiver()
	{
		return $this->belongsTo('App\User', 'receiver_id');
	}
}
