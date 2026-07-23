<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoodReport>
 */
class MoodReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mood = fake()->numberBetween(1, 10);
        $anxiety = fake()->numberBetween(1, 10);
        $stress = fake()->numberBetween(1, 10);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'mood' => $mood,
            'anxiety' => $anxiety,
            'stress' => $stress,
            'total_score' => $mood + $anxiety + $stress,
        ];
    }
}
