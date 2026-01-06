<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTherapistCommentRequest;
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
            ->withCount('comments')
            ->latest()
            ->paginate(6);

        return view('therapist.users.journals.index', ['journals' => $journals, 'user' => $user]);
    }

    public function show(Request $request, User $user, Journal $journal)
    {
        if ($request->user()->cannot('viewJournal', [$user, $journal])) {
            abort(403);
        }

        $journal->load('comments');

        return view('therapist.users.journals.show', ['journal' => $journal, 'user' => $user]);
    }

    public function store(StoreTherapistCommentRequest $request, User $user, Journal $journal)
    {
        $createdComment = $request->user()->comments()->create(

            $request->safe()->merge([
                'journal_id' => $journal->id,
                'user_id' => $user->id,
            ])->all()
        );

        $request->session()->flash('success', 'Your comment has been created.');

        return redirect()
            ->route('therapist.users.journals.show', [$user, $journal]);
    }
}
