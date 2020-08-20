<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'post' => $this->post ,
            'user_id' => $this->user_id ,
            'post_image1' => !empty($this->post_image1) ? $this->post_image1 : null ,
            'post_image2' => !empty($this->post_image2) ? $this->post_image2 : null ,
            'post_image3' => !empty($this->post_image3) ? $this->post_image3 : null ,
            'post_image4' => !empty($this->post_image4) ? $this->post_image4 : null ,
            'post_image5' => !empty($this->post_image5) ? $this->post_image5 : null ,
            'likes_count' => $this->likes_count ,
            'comments_count' => $this->comments_count ,
            'created_at' => $this->created_at ,
            'updated_at' => $this->updated_at
        ];
    }
}
