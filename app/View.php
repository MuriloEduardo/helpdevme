<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
	protected $fillable = [
		'visitor',
		'device',
		'question_id',
		'user_id'
	];

	public function question()
	{
		return $this->belongsTo('App\Question');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
