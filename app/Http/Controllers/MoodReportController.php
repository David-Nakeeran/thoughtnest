<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMoodReportRequest;
use Illuminate\Http\Request;

class MoodReportController extends Controller
{
    public function create()
    {
        return view('mood-reports.create');
    }

    public function store(StoreMoodReportRequest $request)
    {
        $createReport = $request->user()->moodReports()->create($request->validated());

        $request->session()->flash('success', 'Your mood report has been recorded securely.');

        return redirect('/dashboard/user');
    }
}
