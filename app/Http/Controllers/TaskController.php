<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function create($topic, $id)
    {
        $modul = Modul::findOrFail($id);
        return view('classwork.topic.tugas.create', compact('modul', 'topic'));
    }

    public function store(Request $request, $topic, $id)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'kriteria_penilaian' => 'required|array',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task();
        $task->modul_id = $id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->kriteria_penilaian = $request->kriteria_penilaian;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $id])
            ->with('success', 'Tugas berhasil ditambahkan');
    }

    public function edit($topic, $id, $task_id)
    {
        $modul = Modul::findOrFail($id);
        $task = Task::findOrFail($task_id);
        return view('classwork.topic.tugas.edit', compact('modul', 'task', 'topic'));
    }

    public function update(Request $request, $topic, $id, $task_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'kriteria_penilaian' => 'required|array',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::findOrFail($task_id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->kriteria_penilaian = $request->kriteria_penilaian;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $id])
            ->with('success', 'Tugas berhasil diupdate');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/images', $filename, 'public');

            $url = Storage::url($filePath);
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false, 'error' => ['message' => 'Failed to upload image.']], 400);
    }
}
