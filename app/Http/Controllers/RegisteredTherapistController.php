<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTherapistRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredTherapistController extends Controller
{
    public function create()
    {
        return view('auth.register', ['action' => route('register.therapist')]);
    }

    public function store(RegisterTherapistRequest $request)
    {
        $therapist = User::create($request->validated());
        $therapist->role = 'therapist';
        $therapist->save();

        return redirect('/dashboard/admin');
    }
}
