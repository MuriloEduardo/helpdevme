<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
	use HasApiTokens, Notifiable;

	protected $appends = ['avatar_url'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'slug'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function getAvatarUrlAttribute()
	{
		return !$this->avatar ? $this->avatar : Storage::disk('s3')->url($this->avatar);
	}

	public function questions()
	{
		return $this->hasMany('App\Question');
	}

	public function talks()
	{
		return $this->hasMany('App\Talk');
	}

	public function posts()
	{
		return $this->hasManyThrough('App\Post', 'App\Talk');
	}

	public function comments()
	{
		return $this->posts->where('type', \App\Post::types['comment']);
	}

	public function finances()
	{
		return $this->hasMany('App\Finance');
	}
}
