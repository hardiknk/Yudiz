<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class LogController extends Controller
{
    //
    public function log()
    {
        throw new Exception("Error Processing Request call the exception");
        
    }
}
