<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $visible = [
        // 'password',
        'title',
        'description',
        'img',

    ];
    public function getComment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
