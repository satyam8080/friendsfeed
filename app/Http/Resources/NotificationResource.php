<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\CommonController;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->type == "like"){
            $message = CommonController::name($this->by)." liked your post";
            $object = CommonController::postObject($this->on);
            $user_id = null;
        } elseif ($this->type == "comment"){
            $message = CommonController::name($this->by)." commented on your post";
            $object = CommonController::postObject($this->on);
            $user_id = null;
        } elseif ($this->type == "follow"){
            $message = CommonController::name($this->by)." started following you";
            $object = null;
            $user_id = $this->on;
        }


        return [
            'notification_id' => $this->id,
            'type' => $this->type,
            'notification' => $message,
            'post' => $object,
            'user_id' => $user_id,
            'seen' => $this->seen,
            'created_at' => $this->created_at
        ];
    }
}
