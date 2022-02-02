<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    //this functin find this singer how many songs play
    public function songs()
    {   
        //first another model name second intermediate table, third fk and four fk
        return $this->belongsToMany(Song::class,'singer_songs');
    }
}
