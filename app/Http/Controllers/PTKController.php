<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PTKController extends Controller
{
    public function index()
    {
        // Ambil dosen_id dari user yang sedang login (jika ada authentication)
        $dosenId = Auth::user()->id;

        // Query untuk mengambil user yang sudah mengumpulkan judul dengan dosen_id yang sesuai
        $usersWithJudul = User::where('dosen_id', $dosenId)
            ->join('judul', 'users.id', '=', 'judul.user_id')
            ->whereNull('judul.deleted_at') // hanya data yang tidak di-soft delete
            ->select('users.*', 'judul.judul', 'judul.status')
            ->get();

        // dd($dosenId);
        // dd($usersWithJudul);

        // Return data ke view
        return view('ptk.index', compact('usersWithJudul'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Dapatkan semua id judul yang sesuai (sudah kamu dapatkan di tahap ini)
        $judulIds = DB::table('judul')
            ->select('id')
            ->get();

        // Ambil judul pertama yang diunggah
        $firstJudulId = $judulIds->first()->id;

        // Dapatkan status dan catatan dari request
        $status = $request->input('status');
        $catatan = $request->input('catatan');

        // Update data status dan catatan di tabel proposal berdasarkan judul_id
        DB::table('proposal')
            ->where('judul_id', $firstJudulId)
            ->whereNull('deleted_at')
            ->update([
                'status' => $status,
                'catatan' => $catatan,
                'updated_at' => now()
            ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status dan catatan berhasil diperbarui.');
    }

    public function updateStatusJudul(Request $request, $id)
    {
        // Ambil data status dan catatan dari request
        $status = $request->input('status');
        $catatan = $request->input('catatan');

        // Update data status dan catatan di tabel judul berdasarkan judul_id yang diberikan
        DB::table('judul')
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->update([
                'status' => $status,
                'catatan' => $catatan,
                'updated_at' => now()
            ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status judul berhasil diperbarui.');
    }
}
