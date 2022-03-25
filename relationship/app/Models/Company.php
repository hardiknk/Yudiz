<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
    ];


    // get the user name from the comopany table 
    function getUserName()
    {
        // another model, fk, primary key
        return $this->belongsTo(User::class, 'user_id', 'id');
        // return $this->belongsTo(User::class,'id','user_id'); //column not found error 
    }
}
