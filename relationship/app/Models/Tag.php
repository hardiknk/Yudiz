<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = ['tag_name'];
    
    //many to many polymorphic 
    public function posts()
    {
        return $this->morphedByMany(Post::class,'taggables');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class,'taggables'); 
    }
}
