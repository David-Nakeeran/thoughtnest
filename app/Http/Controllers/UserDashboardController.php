<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('dashboard.user', ['user' => $user]);
    }
}
