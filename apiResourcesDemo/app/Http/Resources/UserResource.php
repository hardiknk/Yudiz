<?php

namespace App\Http\Resources;

use App\Models\PhoneUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    //preserve the collection keys 
    // public $preserveKeys = true;

    public static $wrap = 'user_data';

    public function toArray($request)
    {
        dd($this->whenPivotLoadedAs('getPhone', 'phone_user', function () {
            return $this->getPhone->user_id;
        }));
        // return parent::toArray($request);
        // dd($this);
        return [
            'id' => $this->id,
            'name' => $this->name,

            //when the user id is 2 then only display the secret field 
            // 'secret' => $this->when($this->id == "2", "Here User Id Is Two"),
            // 'secret' => $this->when($this->id, function () {
            //     if ($this->id == "1") {
            //         return 'first id ';
            //     } else {
            //         return false;
            //     }
            // }),

            //merge when condition if the id is 2 so only display first-secret 
            // $this->mergeWhen($this->id == "2", [
            //     'first-secret' => 'name : hardik',
            //     'second-secret' => 'surname : kanzariya',
            // ]),

            // // getting the reletioship single has one 
            // 'phone_name' => $this->getPhone->phon_name,

            // 'phone_name' =>  $this->whenLoaded('getPhones'),

            //using the pivot many to many reletionship ::pending
            // 'phone_id' =>  $this->whenPivotLoaded('phone_users', function () {
            //     return $this->pivot->phone_id;
            // }), //third argument by default load 



            'phone_id' => $this->whenPivotLoaded('phone_user', function () {
                return $this->pivot->phone_id;
            }),

            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    //add the custome response in the  response class
    // public function withResponse($request, $response)
    // {
    //     $response->header('X-Value surname', 'Kanzariy');
    // }
}
