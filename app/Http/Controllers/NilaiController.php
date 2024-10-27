<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NilaiController extends Controller
{
    // Halaman Index Utama yang menampilkan list modul (prinsip di awal, pengembangan kedua)
    public function index()
    {
        $dosenId = auth()->guard('web')->id(); // Ambil ID dosen yang sedang login melalui guard dosens

        // Ambil modul berdasarkan topik 'prinsip' dan 'pengembangan' hanya untuk dosen yang login
        $prinsipModuls = DB::table('moduls')
            ->where('topic', 'prinsip')
            ->where('dosen_id', $dosenId) // Filter berdasarkan dosen yang login
            ->get();

        $pengembanganModuls = DB::table('moduls')
            ->where('topic', 'pengembangan')
            ->where('dosen_id', $dosenId) // Filter berdasarkan dosen yang login
            ->get();

        // Ambil pengguna yang sudah mengumpulkan tugas dari tabel tugas_progress, 
        // lalu join dengan tabel tasks untuk mendapatkan modul_id dan filter berdasarkan dosen yang login
        $usersWithSubmission = DB::table('tugas_progress')
            ->join('users', 'tugas_progress.user_id', '=', 'users.id')
            ->join('tasks', 'tugas_progress.task_id', '=', 'tasks.id') // Join ke tasks untuk mengambil modul_id
            ->join('moduls', 'tasks.modul_id', '=', 'moduls.id') // Join ke modul untuk memfilter berdasarkan dosen
            ->where('moduls.dosen_id', $dosenId) // Filter berdasarkan dosen yang login
            ->select('users.name', 'users.id', 'tasks.modul_id') // Mengambil modul_id dari tasks
            ->distinct()
            ->get();

        // Jika tidak ada pengguna yang mengumpulkan, kosongkan hasil
        if ($usersWithSubmission->isEmpty()) {
            $usersWithSubmission = collect(); // Kosongkan collection
        }

        return view('nilai.index', compact('prinsipModuls', 'pengembanganModuls', 'usersWithSubmission'));
    }


    public function topicIndex($topic, $modul_id)
    {
        $userId = auth()->id(); // Mengambil dosen_id dari user yang login

        // Ambil modul berdasarkan modul_id dan topik
        $modul = DB::table('moduls')
            ->where('id', $modul_id)
            ->where('topic', $topic)
            ->where('dosen_id', $userId)
            ->first();

        if (!$modul) {
            return redirect()->back()->with('error', 'Modul tidak ditemukan!');
        }

        // Ambil semua tugas berdasarkan modul yang dipilih
        $tasks = DB::table('tasks')
            ->where('modul_id', $modul->id)
            ->get();

        // Ambil semua progress berdasarkan modul yang dipilih
        $progress = DB::table('progress')
            ->join('users', 'progress.user_id', '=', 'users.id')
            ->where('progress.modul_id', $modul->id)
            ->select('progress.*', 'users.name as user_name')
            ->get();

        // Set tugas_progress_id dan hitung nilai rata-rata
        foreach ($progress as $row) {
            $taskProgress = DB::table('tugas_progress')
                ->where('user_id', $row->user_id)
                ->whereIn('task_id', $tasks->pluck('id')->toArray()) // Ambil berdasarkan task yang ada di modul ini
                ->first();

            if ($taskProgress) {
                $row->tugas_progress_id = $taskProgress->id;

                // Decode nilai dari JSON ke array
                $nilaiData = json_decode($taskProgress->nilai, true);
                if ($nilaiData && is_array($nilaiData)) {
                    // Ambil rata-rata nilai dari array
                    $totalNilai = array_sum(array_column($nilaiData, 'nilai'));
                    $jumlahKriteria = count($nilaiData);
                    $row->average_score = $jumlahKriteria > 0 ? round($totalNilai / $jumlahKriteria, 2) : 'N/A';
                } else {
                    $row->average_score = 'N/A';
                }
            } else {
                $row->tugas_progress_id = null;
                $row->average_score = 'N/A';
            }
        }

        // Hanya tampilkan progress jika ada tugas yang terkumpul
        $filteredProgress = $progress->filter(function ($row) {
            return $row->tugas_progress_id !== null;
        });

        return view('nilai.topic_index', compact('progress', 'filteredProgress', 'modul', 'tasks'));
    }


    public function detail($modul_id, $tugas_progress_id)
    {
        // Ambil detail tugas berdasarkan tugas_progress_id dan modul_id
        $taskDetail = DB::table('tugas_progress')
            ->join('users', 'tugas_progress.user_id', '=', 'users.id')
            ->join('tasks', 'tugas_progress.task_id', '=', 'tasks.id')
            ->where('tugas_progress.id', $tugas_progress_id)
            ->where('tasks.modul_id', $modul_id)
            ->select('tugas_progress.*', 'users.name as user_name', 'users.nim', 'tasks.kriteria_penilaian')
            ->first();

        if (!$taskDetail) {
            return redirect()->route('nilai.index')->with('error', 'Tugas tidak ditemukan');
        }

        // Decode kriteria_penilaian dan nilai dari tugas_progress
        $kriteriaPenilaian = json_decode($taskDetail->kriteria_penilaian, true);
        $nilai = json_decode($taskDetail->nilai, true); // Nilai yang sudah diisi sebelumnya

        return view('nilai.detail', compact('taskDetail', 'kriteriaPenilaian', 'nilai'));
    }



    public function storeDetail(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kriteria_nilai.*.nilai' => 'required|numeric|min:0|max:100',
        ]);

        // Ambil input kriteria_nilai dan simpan sebagai array asosiatif dengan index dan nilai
        $kriteria_nilai = [];
        foreach ($request->input('kriteria_nilai') as $index => $kriteria) {
            $kriteria_nilai[] = [
                'index' => $index, // Ambil index dari array
                'nilai' => $kriteria['nilai'], // Simpan nilai yang diberikan
            ];
        }

        // Encode array kriteria_nilai menjadi JSON untuk disimpan ke database
        $kriteria_nilai_json = json_encode($kriteria_nilai);

        // Update atau simpan nilai di tabel tugas_progress
        DB::table('tugas_progress')->where('id', $id)->update([
            'nilai' => $kriteria_nilai_json,
            'updated_at' => now(),
        ]);

        // Ambil detail tugas untuk redirect ke halaman index dinamis
        $taskDetail = DB::table('tugas_progress')
            ->where('id', $id)
            ->first();

        if (!$taskDetail) {
            return redirect()->route('nilai.index')->with('error', 'Tugas tidak ditemukan.');
        }

        // Ambil modul_id dan topic untuk redirect ke halaman topicIndex
        $task = DB::table('tasks')
            ->join('moduls', 'tasks.modul_id', '=', 'moduls.id') // Join dengan modul untuk mendapatkan topic
            ->where('tasks.id', $taskDetail->task_id)
            ->select('moduls.topic', 'tasks.modul_id')
            ->first();

        if (!$task) {
            return redirect()->route('nilai.index')->with('error', 'Modul tidak ditemukan.');
        }

        // Redirect ke halaman nilai berdasarkan modul dan topik
        return redirect()->route('nilai.topic.index', ['topic' => $task->topic, 'modul_id' => $task->modul_id])
            ->with('success', 'Nilai berhasil disimpan!');
    }
}
