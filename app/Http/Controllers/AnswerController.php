<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailQuizs;
use App\Models\Quizs;
use App\Models\Answer;
use App\Models\Questions;
use App\Models\Choose;
use App\Models\Scores;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;




class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function authtoken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);
    
        $token = $request->input('token');
    
        if ($token) {
            // Cari quiz berdasarkan token
            $quiz = Quizs::where('token', $token)->first();
    
            if ($quiz) {
                // Dapatkan users_id dari session atau Auth (menyesuaikan kebutuhan proyek)
                $usersId = session('users_id'); // Contoh: menggunakan session
                // $usersId = Auth::id(); // Alternatif: menggunakan Auth jika diperlukan
    
                // Cek apakah sudah ada jawaban dari user untuk quiz ini
                $existingAnswer = Answer::where('quizs_id', $quiz->quizs_id)
                    ->where('users_id', $usersId)
                    ->first();
    
                if ($existingAnswer) {
                    // Jika sudah ada jawaban, kembalikan ke halaman sebelumnya
                    return redirect()->back()->with('error', 'Anda sudah mengerjakan quiz ini.');
                }
    
                // Cek apakah waktu quiz saat ini berada dalam rentang start_date dan end_date
                $currentDateTime = Carbon::now();
                $startDate = Carbon::parse($quiz->start_date);
                $endDate = Carbon::parse($quiz->end_date);
    
                if (!$currentDateTime->between($startDate, $endDate)) {
                    // Jika waktu sekarang tidak berada dalam rentang waktu quiz, kembalikan ke halaman sebelumnya
                    return redirect()->back()->with('error', 'Quiz ini sudah selesai atau belum dimulai.');
                }
    
                // Cek apakah status quiz adalah 'on going'
                if ($quiz->status !== 'on going') {
                    return redirect()->back()->with('error', 'Quiz tidak dapat diakses karena tidak dalam status on going.');
                }
    
                // Hitung jumlah pertanyaan untuk quiz ini
                $questionCount = DetailQuizs::where('quizs_id', $quiz->quizs_id)->count();
    
                // Format tanggal
                $startDateFormatted = $startDate->format('d M Y');
                $endDateFormatted = $endDate->format('d M Y');
    
                // Tampilkan halaman informasi quiz
                return view('user.info', compact(
                    'quiz',
                    'startDateFormatted',
                    'endDateFormatted',
                    'questionCount'
                ));
            }
        }
    
        return redirect()->back()->with('error', 'Token tidak ditemukan');
    }
    
    public function startQuiz(Request $request)
    {
        $users_id = session('users_id');
        if (!$users_id) {
            return redirect()->back()->with('error', 'User tidak terautentikasi.');
        }
        
        $quizs_id = $request->input('quizs_id');
        $duration = $request->input('duration');
        
        // Ambil quiz dan periksa tipe kuis (type_name)
        $quiz = Quizs::join('types', 'quizs.types_id', '=', 'types.types_id')
                     ->where('quizs.quizs_id', $quizs_id)
                     ->first();
        
        if (!$quiz) {
            return redirect()->back()->with('error', 'Kuis tidak ditemukan.');
        }
        
        $detailQuizs = DetailQuizs::where('quizs_id', $quizs_id)->get();
        if ($quiz->types_name === 'Kuis Kecermatan') {
            $randomQuestion = Questions::inRandomOrder()->first();

            // Jika tidak ada pertanyaan untuk kuis ini
            if (!$randomQuestion) {
                return redirect()->back()->with('error', 'Tidak ada pertanyaan untuk kuis ini.');
            }
    
            $question_id = $randomQuestion->questions_id;
    
            // Simpan jawaban pertama dengan question_id yang dipilih secara acak
            $answer = Answer::firstOrCreate([
                'users_id'    => $users_id,
                'quizs_id'    => $quizs_id,
                'question_id' => $question_id,
            ], [
                'answers' => null, 
                'score'   => 0,
                'status'  => 'on going',
            ]);
    
            // Simpan jawaban pertama dengan question_id yang dipilih secara acak
            $answer = Answer::firstOrCreate([
                'users_id'    => $users_id,
                'quizs_id'    => $quizs_id,
                'question_id' => $question_id,
            ], [
                'answers' => null, 
                'score'   => 0,
                'status'  => 'on going',
            ]);

          
            // Redirect ke halaman kuis kecermatan dan kirimkan answer_id
            return view('user.kuis-kecermatan', [
                'answer_id' => $answer->answers_id,
                'answers'=>$answer->answers
            ]);
        }
        foreach ($detailQuizs as $detail) {
            Answer::firstOrCreate([
                'users_id'    => $users_id,
                'quizs_id'    => $quizs_id,
                'question_id' => $detail->question_id,
            ], [
                'answers' => null, 
                'score'   => 0,
                'status'  => 'on going',  
            ]);
        }
    
        // Ambil soal dan jawaban pengguna
        $questions = Questions::join('answers', 'questions.questions_id', '=', 'answers.question_id')
            ->where('answers.users_id', $users_id)  
            ->where('answers.quizs_id', $quizs_id)  
            ->select('questions.*', 'answers.answers as user_answer', 'answers.score as user_score', 'answers.status as answer_status')
            ->distinct() 
            ->get();
    
        // Ambil pilihan untuk soal yang bertipe 'choose'
        $questionsWithChoices = $questions->map(function ($question) {
            if ($question->type === 'choose') {
                $question->choices = Choose::where('questions_id', $question->questions_id)->get();
            }
            return $question;
        });

     
    
        // Tampilkan tampilan kuis
        return view('user.quiz', compact('questionsWithChoices', 'duration', 'quizs_id'));
    }
    

public function updateAnswers(Request $request)
{
    $users_id = session('users_id');
    $validated = $request->validate([
        'question_id' => 'required',
        'answer' => 'required|string',
    ]);

    $questionsId = $validated['question_id'];
    $answer = $validated['answer'];

    try {
        $correctAnswer = Questions::where('questions_id', $questionsId)->value('answers'); 
        $score = ($answer === $correctAnswer) ? 1 : 0;

        Answer::updateOrCreate(
            ['question_id' => $questionsId, 'users_id' => $users_id], 
            ['answers' => $answer, 'score' => $score] 
        );

        return response()->json(['message' => 'Jawaban berhasil diperbarui', 'score' => $score], 200);

    } catch(\Exception $e) {
        return response()->json(['message' => 'Jawaban tidak ditemukan'], 403);
    };
}








public function updateScorePlus(Request $request)
{
    // Ambil data dari request
    $answers_id = $request->input('answers_id');
    $new_score = $request->input('score');

    // Cari record Answer berdasarkan answers_id
    $answer = Answer::find($answers_id);

    if (!$answer) {
        // Jika tidak ditemukan, kembalikan error
        return redirect()->back()->with('error', 'Jawaban tidak ditemukan.');
    }

    // Update score
    $answer->score = $new_score;
    $answer->answers = '1';
    $answer->save();  // Simpan perubahan

    // Kembalikan respons sukses
    return response()->json(['message' => 'Jawaban berhasil diperbarui', 'score' => $answer->score], 200);



}



public function updateScore(Request $request)
{
    // Ambil data dari request
    $answers_id = $request->input('answers_id');
    $new_score = (int) $request->input('score');  // Pastikan score adalah integer

    // Cari record Answer berdasarkan answers_id
    $answer = Answer::find($answers_id);

    if (!$answer) {
        // Jika tidak ditemukan, kembalikan error
        return response()->json(['error' => 'Jawaban tidak ditemukan.'], 400);
    }

    // Ambil skor lama dan tambahkan dengan skor baru
    $current_score = (int) $answer->score;  // Pastikan skor lama adalah integer
    $total_score = $current_score + $new_score;

    // Update score tanpa mengubah answers
    $answer->score = $total_score;
    $answer->save(); 

    // Kembalikan respons sukses
    return response()->json([
        'message' => 'Skor berhasil diperbarui', 
        'score' => $answer->score
    ], 200);
}


public function incrementAnswers(Request $request)
{
    // Ambil data dari request
    $answers_id = $request->input('answers_id');

    // Cari record Answer berdasarkan answers_id
    $answer = Answer::find($answers_id);

    if (!$answer) {
        // Jika tidak ditemukan, kembalikan error
        return response()->json(['error' => 'Jawaban tidak ditemukan.'], 400);
    }

    // Tambahkan jumlah answers
    $answer->answers = (int) $answer->answers + 1;
    $answer->save(); 

    // Kembalikan respons sukses
    return response()->json([
        'message' => 'Jawaban berhasil ditambahkan', 
        'answers' => $answer->answers
    ], 200);
}



// public function updateAnswer(Request $request)
// {
//     // dd("ssss");
//     // Validasi input

//     $validated = $request->validate([
//         'answers_id' => 'required',  // Validasi answers_id apakah ada dalam tabel answers
//         'answer'     => 'required',                               // Validasi answer yang diterima
//         'score'      => 'nullable',                        // Validasi score jika ada (default 0)
//     ]);
   
//     $answerId = $validated['answers_id'];
//     $answer   = $validated['answer'];
//     $score    = $validated['score'] ?? 0; // Menggunakan nilai default 0 jika score tidak dikirim

//     // Update data jawaban pada tabel Answer
//     $updated = Answer::where('answers_id', $answerId)->update([
//         'answers' => $answer,
//         'score'   => $score,
//     ]);
//     dd($updated);

//     // Cek apakah update berhasil
//     if ($updated) {
//         return response()->json(['status' => 'success']);
//     } else {
//         return response()->json(['status' => 'failure', 'message' => 'Update failed'], 500);
//     }
// }

public function finishQuiz(Request $request)
{
    $users_id = session('users_id');
    $quizs_id = $request->input('quizs_id');
    Answer::where('users_id', $users_id)
        ->where('quizs_id', $quizs_id)
        ->update(['status' => 'finish']);

    $correctAnswersCount = Answer::where('quizs_id', $quizs_id)
    ->where('users_id', $users_id)
    ->where('score', 1)  
    ->sum('score');
    $totalAnswersCount = Answer::where('quizs_id', $quizs_id)
        ->where('users_id', $users_id)
        ->count();
    if ($totalAnswersCount > 0) {
        $score = ($correctAnswersCount / $totalAnswersCount) * 100;
        Scores::create([
            'quizs_id' => $quizs_id,
            'users_id' => $users_id,
            'score' => $score,
        ]);
    }
    return redirect('/Home_user')->with('success', 'Quiz selesai.');
}





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
