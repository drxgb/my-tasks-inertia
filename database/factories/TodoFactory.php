<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task'          => fake()->text(30),
            'done'          => fake()->boolean(),
            'important'     => fake()->boolean(),
            'created_at'    => fake()->dateTime(),
        ];
    }
}
