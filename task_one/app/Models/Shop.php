<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = [];


    //here shop and country is related to one country
    public function getCountryName()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
