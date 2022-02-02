<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Company::class;

    public function definition()
    {
        static $order = 1;   
        return [
            'user_id' => $order++,
            'company_name' =>  $this->faker->title,
        ];
    }
}
