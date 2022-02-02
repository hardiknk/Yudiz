<?php

namespace Database\Factories;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Phone::class;

    public function definition()
    {
        return [
            'user_id' =>  $this->faker->randomElement(User::all())['id'],
            'phone_model' =>  $this->faker->word(),
        ];
    }
}
