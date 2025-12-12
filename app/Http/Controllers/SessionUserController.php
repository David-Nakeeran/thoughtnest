<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionUserController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = auth()->user();

            if ($user->role === 'user') {
                return redirect()->intended('dashboard/user');
            } else if ($user->role === 'therapist') {
                return redirect()->intended('dashboard/therapist');
            } else if ($user->role === 'admin') {
                return redirect()->intended('dashboard/admin');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
