<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResoure;
use App\Http\Resources\PostsResource;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public static function comment(Request $request){
        $rules = [
            'comment'	=>	'required',
            'post_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            Comment::create([
                'commentBy' => Auth::user()->id,
                'commentOn' => $request->post_id,
                'comment' => $request->comment
            ]);
            Post::where('id', $request->post_id)->increment('comments_count',1);
            $comment = Comment::orderBy('created_at','DESC')->paginate(10);
            if (count($comment) == 0){
                return response()->json(["status" => 404,"message" => "Unable to post comment" ], 404);
            }
            return response()->json(["status" => 200,"message" => CommentResoure::collection($comment), "links" => $comment ], 200);
        }
    }


    public static function getComment(Request $request){
        $rules = [
            'post_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else {
            $comment = Comment::where('commentOn', $request->post_id)->orderBy('created_at', 'DESC')->paginate(10);
            if (count($comment) == 0) {
                return response()->json(["status" => 404, "message" => "Unable to post comment"], 404);
            }
            return response()->json(["status" => 200, "message" => CommentResoure::collection($comment), "links" => $comment], 200);
        }
    }


    public static function deleteComment(Request $request){
        $rules = [
            'comment_id' =>	'required',
            'post_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            Comment::where([ ['commentBy' , Auth::user()->id], ['id' , $request->comment_id] ])->delete();
            Post::where('id', $request->post_id)->decrement('comments_count',1);
            $comment = Comment::orderBy('created_at','DESC')->paginate(10);
            return response()->json(["status" => 200,"message" => CommentResoure::collection($comment), "links" => $comment ], 200);
        }
    }
}
