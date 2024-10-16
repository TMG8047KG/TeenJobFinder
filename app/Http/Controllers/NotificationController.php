<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function index(){
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('notifications', ['notifications' => $notifications]);
    }
}
