<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    protected $fillable = [
        'follow_by', 'follow_on'
    ];
}
