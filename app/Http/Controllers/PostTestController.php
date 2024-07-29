<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\PostTest;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function create($topic, $modulId)
    {
        $modul = Modul::findOrFail($modulId);
        return view('classwork.topic.post-test.create', compact('modul', 'topic'));
    }

    public function store(Request $request, $topic, $modulId)
    {
        // dd($request->all());
        $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answers' => 'required|string',
            'questions.*.correct_answer' => 'required|string',
            'questions.*.description' => 'nullable|string',
        ]);

        foreach ($request->questions as $questionData) {
            PostTest::create([
                'modul_id' => $modulId,
                'question' => $questionData['question'],
                'answers' => json_decode($questionData['answers']),
                'correct_answer' => $questionData['correct_answer'],
                'description' => $questionData['description'],
            ]);
        }

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $modulId])
            ->with('success', 'Post Test berhasil ditambahkan');
    }

    public function edit($topic, $modulId)
    {
        $modul = Modul::findOrFail($modulId);
        $postTests = PostTest::where('modul_id', $modulId)->get();

        // Decode JSON answers for each post test
        foreach ($postTests as $test) {
            if (is_string($test->answers)) {
                $test->answers = json_decode($test->answers, true);
            }
        }

        return view('classwork.topic.post-test.edit', compact('modul', 'topic', 'postTests'));
    }

    public function update(Request $request, $topic, $modul, $id)
    {

        // dd($request->all());
        $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answers' => 'required|string',
            'questions.*.correct_answer' => 'required|string',
            'questions.*.description' => 'nullable|string',
        ]);

        foreach ($request->questions as $questionData) {
            if (isset($questionData['id'])) {
                // Update existing question
                $postTest = PostTest::findOrFail($questionData['id']);
                $postTest->update([
                    'question' => $questionData['question'],
                    'answers' => json_decode($questionData['answers']),
                    'correct_answer' => $questionData['correct_answer'],
                    'description' => $questionData['description'],
                ]);
            } else {
                // Create new question
                PostTest::create([
                    'modul_id' => $modul,
                    'question' => $questionData['question'],
                    'answers' => json_decode($questionData['answers']),
                    'correct_answer' => $questionData['correct_answer'],
                    'description' => $questionData['description'],
                ]);
            }
        }

        return redirect()->route('classwork.topic.modul', ['topic' => $topic, 'id' => $modul])
            ->with('success', 'Post Test berhasil diperbarui');
    }
}
