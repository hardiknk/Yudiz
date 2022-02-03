<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getAllCity()
    {
        return $this->hasMany(City::class);
    }

    //example of the accesor and first letter of capital in con_name column
    public function getConNameAttribute($value)
    {
        return lcfirst($value);
    }

    //example of the mutor 
    public function setConNameAttribute($value)
    {
        return $this->attributes['con_name'] = $value."test Add";
    }

}
