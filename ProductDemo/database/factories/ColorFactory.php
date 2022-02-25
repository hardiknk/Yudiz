<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $color = ['red', 'white', 'blue', 'green', 'yellow', 'black', 'orange'];
        return [
            'color_name' => $this->faker->unique()->randomElement($color),
        ];
    }
}
