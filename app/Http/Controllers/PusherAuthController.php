<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class PusherAuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // Check if authenticated user is a dosen
        $user = Auth::user();
        // dd($user);
        $dosen_id = DB::table('users')->where('id', $user->id)->value('dosen_id');
        // dd($dosen_id);
        // dd($request->dosen_id);
        if ($dosen_id == $request->dosen_id) {
            $dosen = DB::table('dosens')->where('id', $dosen_id)->first();

            // dd($dosen);

            $pusher = new Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                [
                    'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                    'useTLS' => true
                ]
            );

            $presence_data = ['name' => $dosen->name];
            return $pusher->presence_auth(
                $request->input('channel_name'),
                $request->input('socket_id'),
                $dosen->id,
                $presence_data
            );
        } else {
            return response('Unauthorized', 403);
        }
    }
}
