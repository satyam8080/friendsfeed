<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\FCM;
use Illuminate\Http\Request;

class FCMController extends Controller
{
    public function sendNotification(Request $request)
    {
        $users = "eeDlUZZNRWOpHiVgH7rGlV:APA91bGXZ71CZvJjSHNwrbR_pW0cVPBMUIBXyaCfGNZCVzzCyutBSNv3-ZtOAB-1qSRoH7TH_YoENmJus2K1vX_Up3b1j7V-nskYiqPyKketmi3WgTp6VWucY7n1UuPQ85HU6043Qet4";
        $message = ["title" => 'Welcome', "body" => 'Hello ', 'image' => ""];

        $fields = array(
            'registration_ids' => array($users),
            'data' => ['title' => $message['title'], 'body' => $message['body'] , 'image' => $message['image'] ,'sound' => 'default'],
            'priority' => 'high',
            'content_available' => true
        );
        $fields = json_encode($fields);
        FCM::sendNotification($fields,true);
    }
}
