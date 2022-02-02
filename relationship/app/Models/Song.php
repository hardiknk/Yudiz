<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public function singer()
    {   
        //first another model name second intermediate table, third fk and four fk
        return $this->belongsToMany(Singer::class,'singer_songs');
    }
}
