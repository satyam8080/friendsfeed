<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FCM extends Model
{
    public  static function sendNotification($fields, $log_result = true)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key='."BK55n4FkD564kwn0TGvO0-8Gfj51M3IBlV_OyhtTnKTNr3pl9RvNm62u6dzpSEaJ0baqegfUVcZZy5-Aatk19To
",
            'Content-Type: application/json'
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
