<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';
    public $primaryKey = 'likesId';
    public $timestamps = true;

    public function posts()
    {
    	return $this->belongsTo('App\Post');
    }
}
