<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Followers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    public static function follow(Request $request){
        $rules = [
            'user_id'	=>	'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(["status" => 404,"message" => $validator->errors()], 404);
        } else{
            if (Auth::user()->id == $request->user_id){
                return response()->json(["status" => 404,"message" => "You cant follow yourself"], 404);
            }
            if (User::where('id', $request->user_id)->count() == 0){
                return response()->json(["status" => 404,"message" => "Invalid user"], 404);
            }
            $follow = Followers::where([ ['follow_by' , Auth::user()->id], ['follow_on' , $request->user_id] ])->get();
            if (count($follow) == 0){
                Followers::create([
                    'follow_by' => Auth::user()->id ,
                    'follow_on' => $request->user_id
                ]);
                User::where('id', Auth::user()->id)->increment('following',1);
                User::where('id', $request->user_id)->increment('followers',1);

                $user = User::where('id', $request->user_id)->get();
                return response()->json(["status" => 200,"message" => UserResource::collection($user) ], 200);
            } else{
                Followers::where([ ['follow_by' , Auth::user()->id], ['follow_on' , $request->user_id] ])->delete();
                User::where('id', Auth::user()->id)->decrement('following',1);
                User::where('id', $request->user_id)->decrement('followers',1);

                $user = User::where('id', $request->user_id)->get();
                return response()->json(["status" => 200,"message" => UserResource::collection($user) ], 200);
            }
        }
    }

    public static function check($user_id){
        if (Auth::user()->id == $user_id){
            return 2;
        }
        $follow = Followers::where([ ['follow_by' , Auth::user()->id], ['follow_on' , $user_id] ])->get();
        if (count($follow) == 0){
            return 0;
        } else{
            return 1;
        }
    }
}
