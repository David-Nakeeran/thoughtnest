<?php

namespace App\Policies;

use App\Models\Comment;
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

    public function destroy(User $therapist, Comment $comment)
    {
        return TherapistAssignment::where('therapist_id', '=', $therapist->id)->where('user_id', '=', $comment->journal->user_id)->exists() && $therapist->id === $comment->user_id;
    }
}
