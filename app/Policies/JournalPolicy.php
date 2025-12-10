<?php

namespace App\Policies;

use App\Models\Journal;
use App\Models\User;

class JournalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->role === 'user';
    }

    public function view(User $user, Journal $journal)
    {
        return $user->id === $journal->user_id;
    }

    public function create(User $user)
    {
        return $user->role === 'user';
    }

    public function update(User $user, Journal $journal)
    {
        return $user->role === 'user' && $user->id === $journal->user_id;
    }

    public function destroy(User $user, Journal $journal)
    {
        return $user->role === 'user' && $user->id === $journal->user_id;
    }
}
