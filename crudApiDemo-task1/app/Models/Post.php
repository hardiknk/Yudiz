<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    
    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('d-m-Y g:i A'),
        );
    }
    public function updatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('d-m-Y g:i A'),
        );
    }
}
