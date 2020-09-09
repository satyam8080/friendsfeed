<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'username' => $this->username ,
            'email' => $this->email ,
            'dob' => $this->dob ,
            'gender' => $this->gender ,
            'profileImage' => !empty($this->profileImage) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->profileImage : null ,
            'following' => $this->following ,
            'followers' => $this->followers ,
            'bio' => $this->bio ,
            'created_at' => $this->created_at
        ];
    }
}
