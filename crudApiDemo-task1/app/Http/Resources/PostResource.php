<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
            'title' => $this->title,
            'description' => $this->description,
            'total_comment' => $this->when(isset($this->get_comment_count), $this->get_comment_count),
            'post_id' => $this->id,
            'user_id' => $this->user_id,
            'img' => env('APP_URL') . '/postImage/' . $this->img,
        ];
    }
}
