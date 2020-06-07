<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Notifications\MessageSent;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('home', compact('users'));
    }

    public function store(MessageRequest $request)
    {
        $msg = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSent($msg));

        return back()->withFlash('Tu mensaje fue enviado');
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}
