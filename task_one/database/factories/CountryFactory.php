<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Country::class;
    public function definition()
    {
        return [
           'con_name' => $this->faker->text(),
        ];
    }
}
