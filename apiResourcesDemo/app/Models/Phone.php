<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';
    protected $fillable = ['phon_name', 'user_id'];
    public function getUsers()
    {
        return $this->belongsToMany(User::class, 'phone_user');
    }
}
