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
        if(request()->wantsJson())
        {
            return auth()->user()->unreadNotifications;
        }

        return view('notifications.index', [
            'unreadNotifications' => auth()->user()->unreadNotifications,
            'readNotifications' => auth()->user()->readNotifications
        ]);
    }

    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        if(request()->wantsJson())
        {
            return auth()->user()->unreadNotifications;
        }

        return back()->withFlash('Notificación marcada como leída');
    }

    public function readAll()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;

        foreach ($unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        if(request()->wantsJson())
        {
            return auth()->user()->unreadNotifications;
        }

        return back()->withFlash('No hay notificaciones pendientes');
    }

    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();

        return back()->withFlash('Notificación eliminada');
    }
}
