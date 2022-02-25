<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getColor()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function getSize()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
