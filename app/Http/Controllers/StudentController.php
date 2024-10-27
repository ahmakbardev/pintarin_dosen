<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all(); // Bisa ditambahkan pagination jika diperlukan

        // Kirim data user ke view
        return view('students.index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        // Dapatkan data user berdasarkan ID
        $user = User::findOrFail($id);

        // Tambahkan data judul dan proposal ke data user
        $ptkProposalData = $this->showPTKProposal($id);

        // Get progress data for the user based on the modules and topics
        $progressPrinsip = $this->getUserProgressPrinsip($id);
        $progressPengembangan = $this->getUserProgressPengembangan($id);

        // Kirim data user dan data proposal ke view
        return view('students.detail.index', [
            'user' => $user,
            'ptkProposalData' => $ptkProposalData,
            'progressPrinsip' => $progressPrinsip,
            'progressPengembangan' => $progressPengembangan,
        ]);
    }


    public function getUserProgressPrinsip($userId)
    {
        $dosenId = auth()->guard('web')->user()->id;

        // Fetch progress for the user and filter by dosen and 'prinsip' topic
        $progress = DB::table('progress')
            ->join('moduls', 'progress.modul_id', '=', 'moduls.id')
            ->where('progress.user_id', $userId)
            ->where('moduls.topic', 'prinsip')
            ->where('moduls.dosen_id', $dosenId)
            ->select('progress.*', 'moduls.name as module_name', 'moduls.id as module_id')
            ->get();

        foreach ($progress as $prog) {
            $materiIds = json_decode($prog->materi_ids);

            // Get all materials related to this module
            $materis = DB::table('materis')
                ->where('modul_id', $prog->modul_id)
                ->select('id', 'title')
                ->get();

            // Get tasks related to this module and user
            $tasks = DB::table('tugas_progress')
                ->where('user_id', $userId)
                ->join('tasks', 'tugas_progress.task_id', '=', 'tasks.id') // Join untuk mendapatkan detail tugas
                ->where('tasks.modul_id', $prog->modul_id)
                ->select('tugas_progress.id as tugas_progress_id', 'tasks.description', 'tugas_progress.pdf_path', 'tugas_progress.ppt_path', 'tugas_progress.nilai')
                ->get();

            // Check if post-test exists for the module
            $postTestExists = DB::table('post_tests')
                ->where('modul_id', $prog->modul_id)
                ->exists();

            // Calculate completion
            $totalItems = count($materis) + count($tasks);
            $completedItems = count($materiIds) + $tasks->filter(fn($task) => $task->pdf_path || $task->ppt_path)->count();
            $prog->completion_percentage = $totalItems > 0 ? ($completedItems / $totalItems) * 100 : 0;

            foreach ($materis as $materi) {
                $materi->completed = in_array($materi->id, $materiIds);
            }

            // Add the post-test existence to the progress object
            $prog->post_test_exists = $postTestExists;
            $prog->materis = $materis;
            $prog->tasks = $tasks;
        }

        return $progress;
    }

    public function getUserProgressPengembangan($userId)
    {
        $dosenId = auth()->guard('web')->user()->id;

        // Fetch progress for the user and filter by dosen and 'pengembangan' topic
        $progress = DB::table('progress')
            ->join('moduls', 'progress.modul_id', '=', 'moduls.id')
            ->where('progress.user_id', $userId)
            ->where('moduls.topic', 'pengembangan')
            ->where('moduls.dosen_id', $dosenId)
            ->select('progress.*', 'moduls.name as module_name', 'moduls.id as module_id')
            ->get();

        foreach ($progress as $prog) {
            $materiIds = json_decode($prog->materi_ids);

            // Get all materials related to this module
            $materis = DB::table('materis')
                ->where('modul_id', $prog->modul_id)
                ->select('id', 'title')
                ->get();

            // Get tasks related to this module and user
            $tasks = DB::table('tugas_progress')
                ->where('user_id', $userId)
                ->join('tasks', 'tugas_progress.task_id', '=', 'tasks.id') // Join untuk mendapatkan detail tugas
                ->where('tasks.modul_id', $prog->modul_id)
                ->select('tugas_progress.id as tugas_progress_id', 'tasks.description', 'tugas_progress.pdf_path', 'tugas_progress.ppt_path', 'tugas_progress.nilai')
                ->get();

            // Check if post-test exists for the module
            $postTestExists = DB::table('post_tests')
                ->where('modul_id', $prog->modul_id)
                ->exists();

            // Calculate completion
            $totalItems = count($materis) + count($tasks);
            $completedItems = count($materiIds) + $tasks->filter(fn($task) => $task->pdf_path || $task->ppt_path)->count();
            $prog->completion_percentage = $totalItems > 0 ? ($completedItems / $totalItems) * 100 : 0;

            foreach ($materis as $materi) {
                $materi->completed = in_array($materi->id, $materiIds);
            }

            // Add the post-test existence to the progress object
            $prog->post_test_exists = $postTestExists;
            $prog->materis = $materis;
            $prog->tasks = $tasks;
        }

        return $progress;
    }



    // Function untuk mendapatkan data judul dan proposal terkait
    public function showPTKProposal($userId)
    {
        // Ambil data judul yang tidak dihapus secara soft-delete berdasarkan user_id
        $judul = DB::table('judul')
            ->where('user_id', $userId)
            ->whereNull('deleted_at')
            ->first();

        // Jika judul ditemukan, ambil juga data proposal terkait berdasarkan user_id
        if ($judul) {
            $proposal = DB::table('proposal')
                ->join('judul', 'proposal.judul_id', '=', 'judul.id')
                ->where('judul.user_id', $userId)
                ->whereNull('proposal.deleted_at')
                ->select('proposal.*')
                ->first(); // Hanya ambil satu proposal terkait

            // Gabungkan data judul dan proposal
            return [
                'judul' => $judul,
                'proposal' => $proposal
            ];
        }

        // Jika tidak ada data judul atau proposal, kembalikan null
        return null;
    }
}
