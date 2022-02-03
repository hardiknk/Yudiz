<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'country_id'=> $this->faker->randomElement(Country::all())['id'],
            'city_id'=> $this->faker->randomElement(City::all())['id'],
            'shop_id'=> $this->faker->randomElement(Shop::all())['id'],
            'employee_name' => $this->faker->unique()->name(),
            'emp_email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
