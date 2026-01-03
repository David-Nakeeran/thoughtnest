<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\TherapistAssignment;
use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function viewJournals(User $therapist, User $user)
    {
        return TherapistAssignment::where('therapist_id', '=', $therapist->id)->where('user_id', '=', $user->id)->exists();
    }

    public function viewJournal(User $therapist, User $user, Journal $journal)
    {
        return TherapistAssignment::where('therapist_id', '=', $therapist->id)->where('user_id', '=', $user->id)->exists() && $journal->user_id === $user->id;
    }
}
