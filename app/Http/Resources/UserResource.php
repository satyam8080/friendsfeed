<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\FollowController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'id' => $this->id ,
            'name' => $this->name ,
            'username' => "@".$this->username ,
            'email' => $this->email ,
            'dob' => $this->dob ,
            'gender' => $this->gender ,
            'profileImage' => !empty($this->profileImage) ? Storage::disk('s3')->url('public/users/'.$this->id.'/profile/images/'.$this->profileImage) : null ,
            'following' => $this->following ,
            'followers' => $this->followers ,
            'follow' => FollowController::check($this->id) ,
            'bio' => $this->bio ,
            'active' => $this->active ,
            'created_at' => $this->created_at
        ];
    }
}
