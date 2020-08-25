<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\PostsResource;
use App\Models\Like;
use App\Models\Post;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public static function index(Request $request){
        return User::find(Auth::user()->id);
  }

  public static function myProfile(Request $request){
        $user = User::where('id', Auth::user()->id)->get();
        return response()->json(["status" => 200,"message" => LoginResource::collection($user) ]);
  }

  public static function myPosts(Request $request){
        $posts = Post::where('user_id', Auth::user()->id )->Paginate(2);
        if (count($posts)){
            return response()->json(["status" => 200,"message" => PostsResource::collection($posts), "links" => $posts ]);
        } else{
            return response()->json(["status" => 404,"message" => "No posts done by user" ]);
        }
  }

  public static function likeCheck($user_id, $post_id){
        $like = Like::where([ ['likeOn' , $post_id], ['likeBy' , $user_id] ])->get();
        if (count($like)){
            return 1;
        }else{
            return 0;
        }
  }
}
