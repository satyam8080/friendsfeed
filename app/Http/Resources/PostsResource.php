<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostsResource extends JsonResource
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
            'user_id' => $this->user_id ,
            'post' => $this->post ,
            'post_image1' => !empty($this->post_image1) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->post_image1 : null ,
            'post_image2' => !empty($this->post_image2) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->post_image2 : null ,
            'post_image3' => !empty($this->post_image3) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->post_image3 : null ,
            'post_image4' => !empty($this->post_image4) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->post_image4 : null ,
            'post_image5' => !empty($this->post_image5) ? env('APP_URL')."/storage/users/".$this->user_id."/posts/images/".$this->post_image5 : null ,
            'likes_count' => $this->likes_count ,
            'comments_count' => $this->comments_count ,
            'liked' => UserController::likeCheck(Auth::user()->id, $this->id) ,
            'created_at' => $this->created_at ,
            'updated_at' => $this->updated_at
        ];
    }
}
