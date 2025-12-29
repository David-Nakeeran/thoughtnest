<?php

namespace App\Http\Controllers;

use App\Models\TherapistAssignment;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TherapistDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $assignedUsers = TherapistAssignment::where('therapist_id', '=', $user->id)->with('user')->get();

        return view('dashboard.therapist', ['user' => $user, 'assignedUsers' => $assignedUsers]);
    }
}
