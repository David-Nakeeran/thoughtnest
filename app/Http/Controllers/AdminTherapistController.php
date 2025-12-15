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
        $users = User::where('role', 'user')->whereDoesntHave('therapists')->get();

        return view('admin.index', ['unassignedUsers' => $users]);
    }
}
