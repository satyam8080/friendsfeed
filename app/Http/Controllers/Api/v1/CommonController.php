<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function name($user_id){
        $user = User::where('id', $user_id)->get();
        if (count($user) == 0){
            return null;
        } else{
            return $user[0]->name;
        }
    }


    public static function userName($user_id){
        $user = User::where('id', $user_id)->get();
        if (count($user) == 0){
            return null;
        } else{
            return $user[0]->username;
        }
    }


    public static function userProfile($user_id){
        $user = User::where('id', $user_id)->get();
        if (count($user) == 0){
            return null;
        } else{
            return $user[0]->profileImage;
        }
    }
}
