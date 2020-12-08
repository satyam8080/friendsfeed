<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public static function postLike(Request $request){
        $rules = [
            'post_id'	=>	'required',
            'post_user_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            $like = Like::where([ ['likeBy' , Auth::user()->id], ['likeOn' , $request->post_id] ])->get();
            if (count($like)){
                # Dislike
                Like::where([ ['likeBy' , Auth::user()->id], ['likeOn' , $request->post_id] ])->delete();
                Post::where('id', $request->post_id)->decrement('likes_count',1);
                NotificationController::unLike($request->post_id, $request->post_user_id);
                $post = Post::where('id', $request->post_id)->get();

                return response()->json(["status" => 200,"message" => PostsResource::collection($post)], 200);
            } else{
                # Like
                Like::create([
                    'likeBy' => Auth::user()->id,
                    'likeOn' => $request->post_id
                ]);
                Post::where('id', $request->post_id)->increment('likes_count',1);
                NotificationController::like($request->post_id, $request->post_user_id);
                $post = Post::where('id', $request->post_id)->get();

                return response()->json(["status" => 200,"message" => PostsResource::collection($post)], 200);
            }
        }
    }
}
