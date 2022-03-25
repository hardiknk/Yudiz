<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //one to one relationship 
    //here one user is only connect with one company 
    function getUserCompanyName()
    {
        //anothertable, foreignkey, primary key 
        // return $this->hasOne(Company::class, 'user_id', 'id')->latestOfMany();
        return $this->hasOne(Company::class, 'user_id', 'id'); 
        // //jo aapde ->latestOfMany() function user karyu hoy to many records ma jene last id hoy teva records aave 
        // // and  oldestOfMany() function oldest records aave 

        //ofMany function ofMany('price', 'max') jeni price maximum hoy teva records 
        // return $this->hasOne(Company::class, 'user_id', 'id')->withDefault([
        //     'name' => 'Guest Author',
        // ]);
    }

    //one to many relationshiop 
    //here one user is many phones so create this funciton 
    function getAllUserPhone()
    {
        return $this->hasMany(Phone::class, "user_id", 'id');
    }
}
