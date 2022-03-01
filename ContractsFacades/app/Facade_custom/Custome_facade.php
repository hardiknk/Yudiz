<?php

namespace App\Facade_custom;

use Illuminate\Support\Facades\Facade;

class Custome_facade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'test';
    }
}
