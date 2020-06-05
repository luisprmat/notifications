<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications
        ]);
    }

    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return back()->withFlash('Notificación marcada como leída');
    }

    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();

        return back()->withFlash('Notificación eliminada');
    }
}
