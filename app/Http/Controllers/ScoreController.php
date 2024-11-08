<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data skor, beserta data quiz dan user terkait
        $scores = Scores::with(['quiz', 'user'])->get();

        // Kirim data ke view
        return view('admin.tabel-skor', compact('scores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah skor baru
        return view('scores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'quizs_id' => 'required|exists:quizs,quizs_id',
            'users_id' => 'required|exists:users,user_id',
            'score' => 'required|integer',
        ]);

        // Menyimpan skor baru
        Scores::create($validatedData);

        return redirect()->route('scores.index')->with('success', 'Score berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail skor berdasarkan ID
        $score = Scores::with(['quiz', 'user'])->findOrFail($id);
        return view('scores.show', compact('score'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit skor berdasarkan ID
        $score = Scores::findOrFail($id);
        return view('scores.edit', compact('score'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'skor' => 'required|numeric',
        ]);
    
        // Cari skor berdasarkan ID
        $score = Scores::find($id);
        if ($score) {
            // Perbarui data skor
            $score->update([
                'score' => $validatedData['skor'],
            ]);
    
            return response()->json(['success' => 'Data berhasil diperbarui']);
        }
    
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus skor berdasarkan ID
        $score = Scores::findOrFail($id);
        $score->delete();

        return redirect()->route('scores.index')->with('success', 'Score berhasil dihapus');
    }
}
