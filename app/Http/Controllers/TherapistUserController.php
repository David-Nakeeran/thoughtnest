<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;

class TherapistUserController extends Controller
{
    public function index(Request $request, User $user)
    {
        if ($request->user()->cannot('viewJournals', $user)) {
            abort(403);
        }

        $journals = Journal::where('user_id', $user->id)
            ->with('comments')
            ->latest()
            ->paginate(6);

        return view('therapist.users.journals.index', ['journals' => $journals]);
    }
}
