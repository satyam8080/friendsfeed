<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResoure;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public static function comment(Request $request){
        $rules = [
            'comment'	=>	'required',
            'post_id' => 'required',
            'post_user_id' => 'required'
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
            NotificationController::comment($request->post_id, $request->post_user_id);
            $comment = Comment::where('commentOn', $request->post_id)->orderBy('created_at','DESC')->paginate(10);
            if (count($comment) == 0){
                return response()->json(["status" => 404,"message" => "Unable to post comment" ], 404);
            }
            return response()->json(["status" => 200,"message" => CommentResoure::collection($comment),
                "likes_count" => CommonController::likesCount($request->post_id), "comments_count" => CommonController::commentsCount($request->post_id) ,
                "links" => $comment ], 200);
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
                return response()->json(["status" => 404, "message" => "No comment for this post"], 404);
            }
            return response()->json(["status" => 200, "message" => CommentResoure::collection($comment),
                "likes_count" => CommonController::likesCount($request->post_id), "comments_count" => CommonController::commentsCount($request->post_id) ,
                "links" => $comment], 200);
        }
    }


    public static function deleteComment(Request $request){
        $rules = [
            'comment_id' =>	'required',
            'post_id' => 'required',
            'post_user_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            $check = Comment::where([ ['commentBy' , Auth::user()->id], ['id' , $request->comment_id] ])->get();
            if (count($check) == 0){
                return response()->json(["status" => 406 ,"message" => "Comment not present or already deleted "], 406);
            }
            Comment::where([ ['commentBy' , Auth::user()->id], ['id' , $request->comment_id] ])->delete();
            Post::where('id', $request->post_id)->decrement('comments_count',1);
            NotificationController::deleteComment($request->post_id, $request->post_user_id);
            $comment = Comment::where('commentOn', $request->post_id)->orderBy('created_at','DESC')->paginate(10);
            return response()->json(["status" => 200,"message" => CommentResoure::collection($comment),
                "likes_count" => CommonController::likesCount($request->post_id), "comments_count" => CommonController::commentsCount($request->post_id) ,
                "links" => $comment ], 200);
        }
    }
}
