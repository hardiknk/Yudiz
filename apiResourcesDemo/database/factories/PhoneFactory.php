<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $phone_name = ["apple", 'samsung', 'vivo', 'mi', 'lava', 'micromax', 'motorola'];
        return [
            'phon_name' => $this->faker->randomElement($phone_name),
            'user_id' => $this->faker->randomElement(User::all())['id'],
        ];
    }
}
