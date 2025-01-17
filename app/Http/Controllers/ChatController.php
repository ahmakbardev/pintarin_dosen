<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $chat = Chat::create([
            'user_id' => $request->user_id,
            'dosen_id' => Auth::id(),
            'message' => $request->message,
            'sender' => 'dosen',
        ]);

        broadcast(new MessageSent($chat))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

    public function fetchMessages($dosen_id, $user_id)
    {
        return Chat::where('dosen_id', $dosen_id)
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
