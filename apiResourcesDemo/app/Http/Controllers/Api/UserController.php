<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getUser()
    {
        // echo "get user all"; exit;
        $user_data = User::get();
        // dd($user_data);
        // dd($user_data);
        // using the single Resource 
        // return  UserResource::collection($user_data);

        //preserve keys properties true 
        // return  UserResource::collection($user_data->keyBy->id);

        //using the collection response 
        // return new UserCollection($user_data);


        //using the reletionship data 
        // dd($user_data->getPhone);
        return  UserResource::collection($user_data);
    }

    public function getSingle($id)
    {
        $user_data = User::find($id);
        return new UserResource($user_data);
    }

    public function getPaginate()
    {
        $user_data = User::paginate(10);
        return  UserResource::collection($user_data);
    }

    public function getReletion()
    {
        $user_data = User::with('getPhone')->get();
        return  UserResource::collection($user_data);
    }

    public function addMetaData()
    {
        $user_data = User::get();
        return new UserCollection($user_data);


        //using the additional method pass the meata data 
        // return (new UserCollection(User::all()))
        //     ->additional(['meta' => [
        //         'method' => 'Additional Method pass the meta data',
        //     ]]);
    }

    public function addResponse()
    {
        return (new UserResource(User::find(1)))
            ->response()
            ->header('X-Value Name', 'Hardik Kanzriaya');
    }
}
