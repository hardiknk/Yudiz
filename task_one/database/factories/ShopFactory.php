<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
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
            'city_id'=> $this->faker->randomElement(City::all())['id'],
            'shop_name' => $this->faker->unique()->name(),
        ];
    }
}
