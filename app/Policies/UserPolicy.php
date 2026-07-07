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

    private function isAssignedTherapist(User $therapist, User $user)
    {
        return TherapistAssignment::where('therapist_id', '=', $therapist->id)->where('user_id', '=', $user->id)->exists();
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function viewJournals(User $therapist, User $user)
    {
        return $this->isAssignedTherapist($therapist, $user);
    }

    public function viewJournal(User $therapist, User $user, Journal $journal)
    {
        return $this->isAssignedTherapist($therapist, $user) && $journal->user_id === $user->id;
    }

    public function viewMoodReports(User $therapist, User $user)
    {
        return $this->isAssignedTherapist($therapist, $user);
    }
}
