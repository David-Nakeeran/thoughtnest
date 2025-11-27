<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJournalRequest;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Journal::class)) {
            abort(403);
        }

        $journals = Journal::where('user_id', $request->user()->id)
            ->withCount('comments')
            ->latest()
            ->simplePaginate(6);

        return view('journals.index', ['journals' => $journals]);
    }

    public function store(StoreJournalRequest $request)
    {
        if ($request->user()->cannot('create', Journal::class)) {
            abort(403);
        }

        $createJournal = $request->user()->journals()->create($request->validated());

        $request->session()->flash('success', 'Your journal entry has been created.');

        return redirect('/dashboard/user');
    }
}
