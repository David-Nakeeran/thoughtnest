<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TherapistAssignment>
 */
class TherapistAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $therapist = User::where('role', 'therapist')->inRandomOrder()->first()->id;
        $user = User::where('role', 'user')->inRandomOrder()->first()->id;

        return [
            'therapist_id' => $therapist,
            'user_id' => $user
        ];
    }
}
