<?php

namespace App\Http\Controllers;

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
}
