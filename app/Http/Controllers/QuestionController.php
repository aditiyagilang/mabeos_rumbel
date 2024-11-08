<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data pertanyaan
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
        
        $questions = Questions::all();
        foreach ($questions as $question) {
            $question->hash = Crypt::encryptString($question->questions_id);
        }
        return view('admin.tabel-pertanyaan', compact('questions')); // Pastikan Anda punya view untuk index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat pertanyaan baru
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'type' => 'required|in:choose,multiple choose,essay', // Validasi tipe pertanyaan
            'questions' => 'required|string',
            'answers' => 'required|string',
        ]);

        // Membuat data pertanyaan baru
        $question = Questions::create([
            'type' => $validatedData['type'],
            'questions' => $validatedData['questions'],
            'answers' => $validatedData['answers'],
        ]);

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail pertanyaan berdasarkan ID
        $question = Questions::findOrFail($id);
        return view('questions.show', compact('question')); // Pastikan Anda punya view untuk show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit pertanyaan berdasarkan ID
        $question = Questions::findOrFail($id);
        return view('questions.edit', compact('question')); // Pastikan Anda punya view untuk edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $hash)
    {
        // Dekripsi hash untuk mendapatkan questions_id
        $id = Crypt::decryptString($hash);  // Menggunakan Crypt::decryptString() untuk mendekripsi

        // Validasi data yang diterima
        $validatedData = $request->validate([
            'question_type' => 'required', // Validasi tipe pertanyaan
            'questions' => 'required|string',
            'answers' => 'required|string',
        ]);
        

        // dd($validatedData -> all());

        // Temukan pertanyaan berdasarkan ID yang sudah didekripsi dan update
        $question = Questions::findOrFail($id);
        
        // Update data pertanyaan
        $question->update([
            'type' => $validatedData['question_type'],
            'questions' => $validatedData['questions'],
            'answers' => $validatedData['answers'],
        ]);

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan dan hapus pertanyaan berdasarkan ID
        $question = Questions::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
