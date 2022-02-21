<?php

namespace App\Models;

use App\Models\Scopes\NotVerifiedUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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


    protected static function booted()
    {
        //this is example of the global scope 
        static::addGlobalScope(new NotVerifiedUser);

        //anonymus global scope it works
        // static::addGlobalScope('ancient', function (Builder $builder) {
        //     $builder->where('email_verified_at', '<>', "null");
        // });
    }


    //using the local scope edit the query 
    // public function scopeIsEamilVerified($query)
    // {
    //     return $query->where('email_verified_at', '<>', "null");
    // }


}
