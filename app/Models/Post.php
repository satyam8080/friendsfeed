<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post', 'user_id', 'post_image1', 'post_image2', 'post_image3', 'post_image4', 'post_image5'
    ];
}
