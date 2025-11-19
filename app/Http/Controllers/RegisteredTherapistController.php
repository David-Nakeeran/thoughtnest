<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredTherapistController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $therapist = User::create($request);
        $therapist['role'] = 'therapist';
        Auth::login($therapist->validated());

        return redirect('/');
    }
}
