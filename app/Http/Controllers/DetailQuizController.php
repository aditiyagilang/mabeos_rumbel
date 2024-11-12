<?php

namespace App\Http\Controllers;

use App\Models\DetailQuizs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Models\Quizs;
use App\Models\Questions;
use Illuminate\Support\Facades\DB;


class DetailQuizController extends Controller
{

    public function index(Request $request)
{
    // Ambil quiz_id terenkripsi dari request
    $encryptedQuizId = $request->query('qid');

    // Dekripsi quiz_id
    try {
        $quizId = Crypt::decryptString($encryptedQuizId);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Invalid quiz_id'], 400);
    }

    // Ambil data kuis yang sesuai
    $quiz = Quizs::findOrFail($quizId);

    // Ambil semua detail quiz yang sesuai dengan quiz_id
    $detailQuizs = DetailQuizs::where('quizs_id', $quizId)
        ->with(['quiz', 'question']) // Load relasi quiz dan question
        ->get();

    // Kembalikan data ke view
    return view('admin.tabel-lihat-pertanyaan', compact('detailQuizs', 'quiz', 'quizId'));
}


public function questions(Request $request)
{
    $encryptedQuizId = $request->query('qid');
    // dd($quizId);

    // Dekripsi quiz_id
    try {
        $quizId = Crypt::decryptString($encryptedQuizId);
        
        
    } catch (\Exception $e) {
        return response()->json(['error' => 'Invalid quiz_id'], 400);
    }

    // Encrypt quiz_id kembali untuk dikirim ke view
    $reEncryptedQuizId = Crypt::encryptString($quizId);

    $questionIdsInDetailQuiz = DB::table('detail_quizs')
    ->where('quizs_id', $quizId)
    ->pluck('question_id'); // Ambil semua question_id yang terhubung dengan quiz_id

// Debugging: Periksa jika data ada
// dd($questionIdsInDetailQuiz);

// Langkah 2: Ambil semua pertanyaan yang `questions_id`-nya tidak ada di list question_id tersebut
$questions = Questions::whereNotIn('questions_id', $questionIdsInDetailQuiz)
    ->get(); // Ambil semua pertanyaan yang `questions_id`-nya tidak ada di list question_id

// Debugging: Periksa jika hasil query sudah benar
// dd($questions);
    // dd($questions);
    // Encrypt questions_id jika perlu
    foreach ($questions as $question) {
        $question->hash = Crypt::encryptString($question->questions_id);
    }

    return view('admin.tabel-detail-kuis', compact('questions', 'quizId'));
}

public function simpanPertanyaan(Request $request)
{
    try {
        // Dekripsi quiz_id
        $decryptedQuizId = $request->input('quiz_id');

        // Cek apakah quiz_id valid
        $quiz = Quizs::find($decryptedQuizId);
        if (!$quiz) {
            return response()->json(['error' => 'Invalid quiz_id'], 400);
        }

    } catch (\Exception $e) {
        return response()->json(['error' => 'Invalid quiz_id'], 400);
    }

    // Pastikan 'questions' ada dalam request dan berisi array
    if (!$request->has('questions') || empty($request->input('questions'))) {
        return response()->json(['error' => 'Tidak ada pertanyaan yang dipilih.'], 400);
    }

    // Validasi data
    $validated = $request->validate([
        'questions' => 'required|array',
        'questions.*' => 'exists:questions,questions_id',
    ]);

    $questions = $validated['questions'];

    foreach ($questions as $questionId) {
        // Insert data ke tabel detail_quizs
        DetailQuizs::create([
            'quizs_id' => $decryptedQuizId, // Gunakan quiz_id yang valid
            'question_id' => $questionId,   // ID pertanyaan yang dipilih
        ]);
    }

    return redirect()->back();
}






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kembali ke view form create
        return view('detail_quizs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'quizs_id' => 'required|exists:quizs,quizs_id',
            'question_id' => 'required|exists:questions,questions_id',
        ]);

        // Simpan data ke tabel detail_quizs
        DetailQuizs::create($validatedData);

        return redirect()->route('detail_quizs.index')
                         ->with('success', 'Detail quiz berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Temukan detail quiz berdasarkan ID
        $detailQuiz = DetailQuizs::with(['quiz', 'question'])->findOrFail($id);

        // Kembalikan view dengan detail quiz
        return view('detail_quizs.show', compact('detailQuiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Temukan detail quiz berdasarkan ID untuk diedit
        $detailQuiz = DetailQuizs::findOrFail($id);

        // Kembalikan view dengan form edit dan data detail quiz
        return view('detail_quizs.edit', compact('detailQuiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'quizs_id' => 'required|exists:quizs,quizs_id',
            'question_id' => 'required|exists:questions,questions_id',
        ]);

        // Temukan detail quiz dan perbarui
        $detailQuiz = DetailQuizs::findOrFail($id);
        $detailQuiz->update($validatedData);

        return redirect()->route('detail_quizs.index')
                         ->with('success', 'Detail quiz berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan detail quiz dan hapus
        $detailQuiz = DetailQuizs::findOrFail($id);
        $detailQuiz->delete();

        return redirect()->route('detail_quizs.index')
                         ->with('success', 'Detail quiz berhasil dihapus');
    }
}
