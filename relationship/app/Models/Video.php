<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'user_id',
        'title',

    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    //many to many polymorphic reletionship 
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }
}
