<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'image',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question');
	}

	public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
