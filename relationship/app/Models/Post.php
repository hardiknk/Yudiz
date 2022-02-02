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

    //define the one to many  polymorphic 
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //one to one polymorphic
    public function comment()
    {
        //if here we apply letest so last comment records display
        return $this->morphOne(Comment::class, 'commentable')->latest();
    }

    //many to many polymorphic 
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'tagable');
    }
}
