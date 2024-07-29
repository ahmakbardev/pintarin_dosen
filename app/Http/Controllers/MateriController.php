<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    // Method create untuk menampilkan form tambah materi
    public function create($topic, $id)
    {
        $modul = Modul::findOrFail($id);
        return view('classwork.topic.materi.create', compact('modul', 'topic'));
    }

    public function store(Request $request, $topic, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|url',
            'file' => 'nullable|string',
        ]);

        $materi = new Materi();
        $materi->modul_id = $id;
        $materi->title = $request->title;
        $materi->content = $request->content;
        $materi->url = $request->url;
        $materi->file = $request->file;
        $materi->save();

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $id])
            ->with('success', 'Materi berhasil ditambahkan');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/images', $filename, 'public'); // Organize under uploads/images

            $url = Storage::url($filePath);
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json(['uploaded' => false, 'error' => ['message' => 'Failed to upload image.']], 400);
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/files', $filename, 'public'); // Organize under uploads/files

            return response()->json([
                'url' => Storage::url($filePath),
                'title' => $file->getClientOriginalName()
            ]);
        }

        return response()->json(['error' => 'Gagal mengunggah file'], 400);
    }


    public function edit($topic, $id, $materi_id)
    {
        $modul = Modul::findOrFail($id);
        $materi = Materi::findOrFail($materi_id);
        return view('classwork.topic.materi.edit', compact('modul', 'materi', 'topic'));
    }

    public function update(Request $request, $topic, $id, $materi_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string', // Ensure this validation rule matches the CKEditor data
            'url' => 'nullable|url',
            'file' => 'nullable|string',
        ]);

        $materi = Materi::findOrFail($materi_id);
        $materi->title = $request->title;
        $materi->content = $request->content; // Ensure content is correctly assigned
        $materi->url = $request->url;
        $materi->file = $request->file;
        $materi->save();

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $id])
            ->with('success', 'Materi berhasil diupdate');
    }

    // Method destroy untuk menghapus materi dari database
    public function destroy($topic, $id, $materi_id)
    {
        $materi = Materi::findOrFail($materi_id);
        $materi->delete();

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $id])
            ->with('success', 'Materi berhasil dihapus');
    }
}
