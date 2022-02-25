<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quantity>
 */
class QuantityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->randomElement(Product::all())['id'],
            'color_id' => $this->faker->randomElement(Color::all())['id'],
            'size' => $this->faker->randomElement(Size::all())['id'],
            'item_quantity' => mt_rand(1, 15),
            'prod_price' => mt_rand(500, 3000),
        ];
    }
}
