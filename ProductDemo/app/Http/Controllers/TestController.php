<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        // ...
        echo "hi involk method is  call";
    }
    //
}
