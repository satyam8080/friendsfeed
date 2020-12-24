<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\CommonController;
use App\Http\Controllers\Api\v1\NotificationController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HeaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'name' => CommonController::firstName(),
            'message_count' => 2,
            'notification_count' => NotificationController::count(),
            'profileImage' => !empty($this->profileImage) ? Storage::disk('s3')->url('public/users/'.$this->id.'/profile/images/'.$this->profileImage) : null
        ];
    }
}
