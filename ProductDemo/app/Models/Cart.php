<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function getProductData()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getQuanity()
    {
        return $this->belongsTo(Quantity::class, 'quantity_id', 'id');
    }

    // //get the color name 
    // public function getColor()
    // {
    //     return $this->belongsTo(Color::class, 'color_id', 'color');
    // }
    // //get the size name
    // public function getSize()
    // {
    //     return $this->belongsTo(Size::class, 'size', 'id');
    // }
}
