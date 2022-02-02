<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'user_id',
        'title',
    ];

    //define the one to many  polymorphenic 
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //one to one polymorphenic
    public function comment()
    {
        //if here we apply letest so last comment records display
        return $this->morphOne(Comment::class, 'commentable')->latest();
    }

}
