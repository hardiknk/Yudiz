<?php

namespace App\Models;

use App\Casts\CustomCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    //casting example also we define the custome cast
    // new created files like money_cast.php and include it and this file wite the 
    // custome casting code in this file set and get method create from the official document
    // and we are casting it
    // here working the custom cast

    // protected $casts =  [
    //     // 'created_at' => 'datetime:Y-m-d',
    //     'con_name'=>CustomCast::class
    // ];

    public function getAllCity()
    {
        return $this->hasMany(City::class);
    }

    // //example of the accesor and first letter of capital in con_name column
    public function getConNameAttribute($value)
    {
        return lcfirst($value);
    }

    // //example of the mutor 
    public function setConNameAttribute($value)
    {
        return $this->attributes['con_name'] = $value."test Add";
    }

    //casting exmaple
}
