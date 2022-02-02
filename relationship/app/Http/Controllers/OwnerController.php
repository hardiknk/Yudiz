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
        dd(Mechenic::find(2)->carOwner);
        // dd(Mechenic::with('carOwner')->get());

    }

    //here multiple owner of car and car is associate with the mechenics
    public function show_multiple_owner()
    {
        dd(Mechenic::find(2)->getMultipleOwner);
        // dd(Mechenic::with('getMultipleOwner')->get());
    }
}
