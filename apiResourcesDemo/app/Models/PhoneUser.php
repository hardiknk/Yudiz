<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

// class PhoneUser extends Pivot
class PhoneUser extends Model
{
    use HasFactory;
    protected $table = 'phone_users';
    protected $fillable = [
        'id	',
        'user_id',
        'phone_id',
        'created_at',
        'updated_at',
    ];
}
