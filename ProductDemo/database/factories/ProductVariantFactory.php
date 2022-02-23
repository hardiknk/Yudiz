<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = ['red', 'white', 'blue', 'green', 'yellow', 'black', 'orange'];
        $size = ['s', 'm', 'l', 'xl', 'xxl'];
        $brands = ['rebook', 'pama', 'polo', 'uspa', 'mi'];
        return [
            'color' => $this->faker->randomElement($color),
            'size' => $this->faker->randomElement($size),
            'prod_brand' => $this->faker->randomElement($brands),
            'product_id' => $this->faker->unique()->randomElement(Product::all())['id'],
        ];
    }
}
