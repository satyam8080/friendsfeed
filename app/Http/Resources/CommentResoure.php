<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\CommonController;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResoure extends JsonResource
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
            'comment_id' => $this->id,
            'user_id' => $this->commentBy,
            'name' => CommonController::name($this->commentBy),
            'username' => CommonController::userName($this->commentBy),
            'profile_picture' => CommonController::userProfile($this->commentBy),
            'comment' => $this->comment,
            'likes_count' => CommonController::likesCount($this->commentOn),
            'comments_count' => CommonController::commentsCount($this->commentOn),
            'created_at' => $this->created_at
        ];
    }
}
