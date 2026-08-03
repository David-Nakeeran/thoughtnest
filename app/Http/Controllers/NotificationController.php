<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markNotificationAsRead(Request $request, string $notification)
    {
        $user = Auth::user();

        $notification = $user->notifications()->findOrFail($notification);

        $notification->markAsRead();

        return back();
    }
}
