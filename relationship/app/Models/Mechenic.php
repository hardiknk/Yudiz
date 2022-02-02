<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechenic extends Model
{
    use HasFactory;
    //define the has-one-through reletionship
    public function carOwner()
    {
        return $this->hasOneThrough(Owner::class, Car::class);
    }
    
    //define the has-many-through reletionship 
    public function getMultipleOwner()
    {
        return $this->hasManyThrough(Owner::class, Car::class);
    }
}
