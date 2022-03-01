<?php

namespace App\Http\Controllers;

use App\Facade_custom\Custome;
use App\Facade_custom\Custome_facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;


class FacadeController extends Controller
{
    //
    public function index()
    {

        // Cache::put("msg_facade", "Hello From The Facade");
        // dd(Cache::get('msg_facade'));
    }

    public function customFacade()
    {
        //here TestFacade is the alias from the config/app.php 
        dd(Custome_facade::getSurname());
        // dd(TestFacade::getUserName());
    }
}
