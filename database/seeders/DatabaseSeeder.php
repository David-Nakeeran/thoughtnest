<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Journal;
use App\Models\MoodReport;
use App\Models\TherapistAssignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 1. Users first
        User::factory(10)->create();

        // 2. Journals
        Journal::factory(10)->create();

        // 3. Comments
        Comment::factory(10)->create();

        // 4. Therapist assignments
        TherapistAssignment::factory(10)->create();

        // 5. Mood reports
        MoodReport::factory(10)->create();
    }
}
