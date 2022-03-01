<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $size = ['s', 'm', 'l', 'xl', 'xxl'];
        return [
            'size' => $this->faker->unique()->randomElement($size),
        ];
    }
}