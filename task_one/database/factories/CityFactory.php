<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'country_id'=> $this->faker->randomElement(Country::all())['id'],
                'city_name'=> $this->faker->city(),
        ];
    }
}
