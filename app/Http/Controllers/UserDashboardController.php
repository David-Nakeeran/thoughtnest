<?php

namespace App\Http\Controllers;

use App\Models\MoodReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $hasMoodReportedThisWeek = MoodReport::where('user_id', $user->id)
            ->whereBetween(
                'created_at',
                [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]
            )
            ->exists();

        return view('dashboard.user', [
            'user' => $user,
            'hasMoodReportedThisWeek' => $hasMoodReportedThisWeek
        ]);
    }
}
