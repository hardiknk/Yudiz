<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // public $collects = User::class;

    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection,
            // 'name' => $this->name,
            // 'email' => $this->email,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,

            // //adding the metadata 
            // //'links' => [
            //  //   'self' => 'link-value',
            // // ],
        ];
    }

    //add meta data using the with method 
    public function with($request)
    {
        return [
            'meta' => [
                'name' => 'Hardik Kanzariya',
            ],
        ];
    }
}
