<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

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


    public static function likesCount($post_id){
        $post = Post::where('id', $post_id)->get();
        if (count($post) == 0){
            return null;
        }else{
            return $post[0]->likes_count;
        }
    }


    public static function commentsCount($post_id){
        $post = Post::where('id', $post_id)->get();
        if (count($post) == 0){
            return null;
        }else{
            return $post[0]->comments_count;
        }
    }


    public static function postObject($post_id){
        $post = Post::where('id', $post_id)->get();
        if (count($post) == 0){
            return null;
        }else{
            return $post;
        }
    }


    public static function userObject($post_id){
        $post = Post::where('id', $post_id)->get();
        if (count($post) == 0){
            return null;
        }else{
            return $post;
        }
    }

    public static function firstName(){
        $lastSpace = strpos(Auth::user()->name ," ");
        if($lastSpace == FALSE) {
            $firstName = Auth::user()->name;
        }else {
            $firstName = substr(Auth::user()->name ,0,$lastSpace);
        }
        return $firstName;
    }
}
