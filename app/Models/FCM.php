<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FCM extends Model
{
    public  static function sendNotification($fields, $log_result = true)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "key=AAAA9Dk7XbI:APA91bFBzw1EOVW2c_wZrVxVBpNtvw0N-GpP_0kivfw9CmzVxy7tQ3OW4RTI2RBA6QrotCj70-RI9viLWGca6__Ieg1YA7wXMTLjDEs3XojObKLuZURR9eu9XBpOq3K7OOd3KAlDy18x"
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);
        curl_close($ch);
        if($log_result) echo $result;
        // echo $result;
        // return $result;

    }
}
