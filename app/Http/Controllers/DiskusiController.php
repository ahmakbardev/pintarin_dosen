<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiskusiController extends Controller
{
    public function index()
    {
        $discussions = DB::table('chats')
            ->join('users', 'chats.user_id', '=', 'users.id')
            ->select(
                'chats.dosen_id',
                'chats.user_id',
                DB::raw('MAX(chats.id) as id'),
                DB::raw('MAX(chats.created_at) as created_at'),
                DB::raw('MAX(chats.message) as message'),
                'users.name as user_name',
                'users.profile_pic as user_profile_pic'
            )
            ->groupBy('chats.dosen_id', 'chats.user_id', 'users.name', 'users.profile_pic')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('diskusi.index', compact('discussions'));
    }

    public function chat($dosen_id, $user_id)
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        $dosen = DB::table('users')->where('id', $dosen_id)->first();
        $discussion = DB::table('chats')
            ->where('dosen_id', $dosen_id)
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->first();

        return view('diskusi.chat.index', compact('dosen', 'user', 'dosen_id', 'user_id', 'discussion'));
    }
}
