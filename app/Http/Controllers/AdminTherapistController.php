<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTherapistAssignment;
use App\Http\Requests\StoreTherapistAssignmentRequest;
use App\Models\TherapistAssignment;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminTherapistController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', 'user')->doesntHave('therapists')->get();

        $therapists = User::where('role', 'therapist')->get();

        return view('admin.index', ['unassignedUsers' => $users, 'therapists' => $therapists]);
    }

    public function store(StoreTherapistAssignmentRequest $request, User $user)
    {
        $therapistId = $request->validated();

        $createTherapistAssignment = TherapistAssignment::create([
            'user_id' => $user->id,
            'therapist_id' => $therapistId['therapist']
        ]);

        $request->session()->flash('success', 'Therapist assigned.');

        return redirect('/therapist-assignments');
    }
}
