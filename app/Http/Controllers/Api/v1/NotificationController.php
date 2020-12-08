<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public static function getNotifications(Request $request)
    {
        $notifications = Notification::where('on', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        if (count($notifications) == 0) {
            return response()->json(["status" => 404, "message" => "No notification found"], 404);
        } else {
            return response()->json(["status" => 200, "message" => NotificationResource::collection($notifications), "links" => $notifications], 200);
        }
    }


    public static function like($like_on){
        Notification::create([
            'type' => "like",
            'by' => Auth::user()->id,
            'on' => $like_on
        ]);
        return null;
    }


    public static function unLike($like_on){
        Notification::where([['by', Auth::user()->id], ['on', $like_on]])->delete();
        return null;
    }


    public static function comment($comment_on){
        Notification::create([
            'type' => "comment",
            'by' => Auth::user()->id,
            'on' => $comment_on
        ]);
        return null;
    }


    public static function deleteComment($comment_on){
        Notification::where([['by', Auth::user()->id], ['on', $comment_on]])->delete();
        return null;
    }


    public static function follow($user_id){
        Notification::create([
            'type' => "follow",
            'by' => Auth::user()->id,
            'on' => $user_id
        ]);
        return null;
    }


    public static function unFollow($user_id){
        Notification::where([['by', Auth::user()->id], ['on', $user_id]])->delete();
        return null;
    }
}
