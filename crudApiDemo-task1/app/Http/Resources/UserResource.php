<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    // public function with($request)
    // {
    //     // return [
    //     //     "status" => "100",
    //     //     "message" => "Hii Hardik",
    //     // ];
    // }
    public function toArray($request)
    {
        // return parent::toArray($request);
        // dd($this['data']);

        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
