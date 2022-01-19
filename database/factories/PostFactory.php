<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => \App\Models\User::factory("App\Models\User"),
            "title" => $this->faker->sentence,
            "body" => $this->faker->paragraph
        ];
    }
}
