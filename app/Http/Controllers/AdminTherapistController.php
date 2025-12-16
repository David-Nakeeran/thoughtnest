<?php

namespace App\Http\Controllers;

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

    public function store(Request $request) {}
}
