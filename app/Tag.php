<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title'
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }
}
