<?php

namespace App\Http\Controllers;

use App\Models\Mechenic;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function show_owner()
    {
        // $owner_data = Mechenic::find(1)->carOwner;
        // return $owner_data;
        // dd(Mechenic::with('carOwner')->get());
        // dd(Mechenic::find(2)->carOwner);
        $data =  Mechenic::find(2)->carOwner;
        echo '<pre>';
        print_r($data);

        //query 

        // select * from `mechenics` where `mechenics`.`id` = 2 limit 1
        // select `owners`.*, `cars`.`mechenic_id` as `laravel_through_key` from `owners` inner join `cars` on `cars`.`id` = `owners`.`car_id` where `cars`.`mechenic_id` = 2 limit 1
    }

    //here multiple owner of car and car is associate with the mechenics
    public function show_multiple_owner()
    {
        dd(Mechenic::find(2)->getMultipleOwner);
        // dd(Mechenic::with('getMultipleOwner')->get());
    }
}
