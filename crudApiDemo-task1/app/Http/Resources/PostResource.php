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
            // 'post_id' => $this->id,
            'post_id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'total_comment' => $this->when(isset($this->get_comment_count), $this->get_comment_count),
            'img' => $this->when($this->img != "null",  env('APP_URL') . '/postImage/' . $this->img),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
