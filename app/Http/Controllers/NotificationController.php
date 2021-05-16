<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function markAllAsRead()
    {
        $user = request()->user();
        $user->unreadNotifications->markAsRead();
        return back();
    }
}
