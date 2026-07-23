<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Journal;
use App\Models\MoodReport;
use App\Models\TherapistAssignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Demo users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@thoughtnest.demo',
            'password' => Hash::make('Password@123'),
            'role' => 'admin',
        ]);

        $therapist = User::create([
            'name' => 'Sarah Jane',
            'email' => 'therapist@thoughtnest.demo',
            'password' => Hash::make('Password@123'),
            'role' => 'therapist',
        ]);

        $patient = User::create([
            'name' => 'Jim Carter',
            'email' => 'patient@thoughtnest.demo',
            'password' => Hash::make('Password@123'),
            'role' => 'user',
        ]);

        TherapistAssignment::create([
            'therapist_id' => $therapist->id,
            'user_id' => $patient->id,
        ]);

        $journal1 = Journal::create([
            'user_id' => $patient->id,
            'content' => 'I found it difficult to concentrate today, but getting outside for a short walk helped me settle my thoughts.',
        ]);

        $journal2 = Journal::create([
            'user_id' => $patient->id,
            'content' => 'This week has been much better. I have been sleeping more consistently and I feel less overwhelmed at work.',
        ]);

        MoodReport::create([
            'user_id' => $patient->id,
            'mood' => 4,
            'anxiety' => 8,
            'stress' => 7,
            'total_score' => 19,
            'notes' => 'Feeling overwhelmed with work.',
        ]);

        MoodReport::create([
            'user_id' => $patient->id,
            'mood' => 6,
            'anxiety' => 6,
            'stress' => 5,
            'total_score' => 17,
            'notes' => 'A better week overall.',
        ]);

        Comment::create([
            'journal_id' => $journal1->id,
            'user_id' => $therapist->id,
            'comment' => 'Thank you for sharing this. It is encouraging that you recognised going for a walk helped. Try to notice any other activities that have a similar effect.',
        ]);

        Comment::create([
            'journal_id' => $journal2->id,
            'user_id' => $therapist->id,
            'comment' => 'It is great to hear that your sleep has improved. We can discuss what has been helping during our next session.',
        ]);
    }
}
