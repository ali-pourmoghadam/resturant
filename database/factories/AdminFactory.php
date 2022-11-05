<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'name' => fake()->name(),

            'last_name'  =>  fake()->name() ,

            'email' => "admin@mail.com",

            'address' => fake()->address(),

            'phone' => fake()->phoneNumber(),

            'work_days' => 48 ,

            'password' => bcrypt("admin"),

            'previlage' => 1

        ];
    }
}
