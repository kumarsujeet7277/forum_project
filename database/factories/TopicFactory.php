<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->word(),
            'status' => fake()->randomElement(['open' ,'closed', 'archived']),
            'views' =>fake()->randomDigit(),
        ];
    }
}
