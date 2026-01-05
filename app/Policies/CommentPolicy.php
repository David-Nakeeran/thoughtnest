<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\TherapistAssignment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $therapist)
    {
        $user = request()->route('user');
        $journal = request()->route('journal');

        return TherapistAssignment::where('therapist_id', '=', $therapist->id)->where('user_id', '=', $user->id)->exists() && $journal->user_id === $user->id;
    }
}
