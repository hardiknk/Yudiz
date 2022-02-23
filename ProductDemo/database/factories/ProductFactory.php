<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prod_name' => $this->faker->text(10),
            'prod_price' => mt_rand(500, 3000),
            'items' => mt_rand(5, 30),
        ];
    }
}
