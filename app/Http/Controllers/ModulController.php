<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Modul;
use App\Models\PostTest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    public function index($topic)
    {
        $dosenId = Auth::id();
        $moduls = Modul::where('topic', $topic)->where('dosen_id', $dosenId)->get();
        return view('topik.index', compact('moduls', 'topic'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'topic' => 'required|string',
        ]);

        $validatedData['dosen_id'] = Auth::id();
        $modul = Modul::create($validatedData);

        $moduls = Modul::where('topic', $modul->topic)->where('dosen_id', Auth::id())->get();

        return response()->json(['modul' => $modul, 'moduls' => $moduls, 'message' => 'Modul berhasil ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $modul = Modul::where('id', $id)->where('dosen_id', Auth::id())->firstOrFail();
        $modul->update($validatedData);

        $moduls = Modul::where('topic', $modul->topic)->where('dosen_id', Auth::id())->get();

        return response()->json(['modul' => $modul, 'moduls' => $moduls, 'message' => 'Modul berhasil diupdate']);
    }

    public function destroy($id)
    {
        $modul = Modul::where('id', $id)->where('dosen_id', Auth::id())->firstOrFail();
        $topic = $modul->topic;
        $modul->delete();

        $moduls = Modul::where('topic', $topic)->where('dosen_id', Auth::id())->get();

        return response()->json(['message' => 'Modul berhasil dihapus', 'moduls' => $moduls]);
    }

    public function showModul($topic, $id)
    {
        $modul = Modul::where('id', $id)->where('dosen_id', Auth::id())->firstOrFail();
        $materis = Materi::where('modul_id', $id)->where('dosen_id', Auth::id())->get();
        $postTests = PostTest::where('modul_id', $id)->where('dosen_id', Auth::id())->get()->unique('modul_id'); // Grouping by modul_id
        $tasks = Task::where('modul_id', $id)->where('dosen_id', Auth::id())->get();

        return view('classwork.topic.modul', compact('modul', 'materis', 'postTests', 'tasks', 'topic'));
    }
}
