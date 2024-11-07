<?php

namespace App\Http\Controllers;

use App\Models\Quizs;
use App\Models\Types; // Import model Types
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     */
    public function index()
    {
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
    
        // Mengambil semua data quiz beserta nama tipe dari relasi
        $quizzes = Quizs::with('type')->get();
    
        // Enkripsi hash untuk setiap quiz berdasarkan ID
        foreach ($quizzes as $quiz) {
            $quiz->hash = Crypt::encryptString($quiz->id); // Enkripsi ID untuk digunakan sebagai hash
        }
    
        // Mengambil semua data tipe
        $types = Types::all();
    
        // Mengirim data quiz dan tipe ke view
        return view('admin.tabel-kuis', compact('quizzes', 'types'));
    }

    /**
     * Show the form for creating a new quiz.
     */
    public function create()
    {
        // Mengambil semua data tipe untuk dropdown
        $types = Types::all();

        return view('quizzes.create', compact('types'));
    }

    /**
     * Store a newly created quiz in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'types_id' => 'required|exists:types,types_id',
            'quizs_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|string'
        ]);
    
        // Membuat token acak sepanjang 11 karakter (huruf kapital dan angka)
        $token = strtoupper(substr(bin2hex(random_bytes(6)), 0, 10));
    
        // Menyimpan data ke database termasuk token
        Quizs::create([
            'types_id' => $request->types_id,
            'quizs_name' => $request->quizs_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'token' => $token,
            'status' => $request->status
        ]);
    
        return redirect()->route('quizzes.index')->with('success', 'Quiz berhasil ditambahkan');
    }
    
    /**
     * Display the specified quiz.
     */
    public function show($hash)
    {
        try {
            // Dekripsi hash untuk mendapatkan ID quiz yang asli
            $quizId = Crypt::decryptString($hash);
        } catch (\Exception $e) {
            return redirect()->route('quizzes.index')->with('error', 'Hash tidak valid');
        }

        // Temukan quiz berdasarkan ID yang didekripsi
        $quiz = Quizs::with('type')->findOrFail($quizId);

        return view('quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified quiz.
     */
    public function edit($hash)
    {
        try {
            // Dekripsi hash untuk mendapatkan ID quiz yang asli
            $quizId = Crypt::decryptString($hash);
        } catch (\Exception $e) {
            return redirect()->route('quizzes.index')->with('error', 'Hash tidak valid');
        }

        // Temukan quiz berdasarkan ID yang didekripsi
        $quiz = Quizs::findOrFail($quizId);

        // Mengambil semua data tipe untuk dropdown
        $types = Types::all();

        return view('quizzes.edit', compact('quiz', 'types'));
    }

    /**
     * Update the specified quiz in storage.
     */
    public function update(Request $request, $id)
    {

        // Validasi input
        $request->validate([
            'types_id' => 'required|exists:types,types_id',
            'quizs_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|string'
        ]);

        // Temukan quiz berdasarkan ID yang didekripsi dan perbarui
        $quiz = Quizs::findOrFail($id);
        $quiz->update([
            'types_id' => $request->types_id,
            'quizs_name' => $request->quizs_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('quizzes.index')->with('success', 'Quiz berhasil diubah');
    }

    /**
     * Remove the specified quiz from storage.
     */
    public function destroy($hash)
    {
        $id = Crypt::decryptString($hash);  // Mendekripsi ID
        
        // Temukan quiz berdasarkan ID yang didekripsi dan hapus
        $quiz = Quizs::findOrFail($id); 
        $quiz->delete();
    
        return redirect()->route('quizzes.index')->with('success', 'Quiz berhasil dihapus');
    }
    
}
