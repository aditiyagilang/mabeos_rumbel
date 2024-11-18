<?php

namespace App\Http\Controllers;

use App\Models\Quizs;
use App\Models\Types; // Import model Types
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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

    public function indexPenilaian()
{
    if (!session()->has('users_id')) {
        return redirect()->route('login')->with('error', 'You need to login first!');
    }

    // Mengambil data quiz dengan status 'end' atau end_date yang melebihi waktu sekarang
    $quizzes = Quizs::with('type')
        ->where('status', 'end')
        ->orWhere('end_date', '<', now())  // Mengambil kuis dengan end_date yang lebih dari waktu sekarang
        ->get();

    // Enkripsi hash untuk setiap quiz berdasarkan ID
    foreach ($quizzes as $quiz) {
        $quiz->hash = Crypt::encryptString($quiz->id); // Enkripsi ID untuk digunakan sebagai hash
    }

    $types = Types::all();

    // dd($quizzes);

    // Mengirim data quiz dan tipe ke view
    return view('admin.penilaian', compact('quizzes', 'types'));
}


public function indexKuisKecermatan()
{
    // Cek apakah pengguna sudah login
    if (!session()->has('users_id')) {
        return redirect()->route('login')->with('error', 'You need to login first!');
    }

    // Ambil user_id dari session
    $userId = session('users_id');

    // Mengambil data kecermatan dengan join tabel quizs berdasarkan user_id dan group berdasarkan quiz_id
    $quizzes = DB::table('kecermatan')
        ->join('quizs', 'kecermatan.quizs_id', '=', 'quizs.quizs_id')  // Gabungkan tabel kecermatan dengan quizs
        ->where('kecermatan.users_id', $userId)  // Filter berdasarkan user_id
        ->select('quizs.quizs_id', 'quizs.quizs_name', 'quizs.updated_at')  // Pilih kolom yang dibutuhkan
        ->groupBy('quizs.quizs_id', 'quizs.quizs_name', 'quizs.updated_at')  // Group by quiz_id
        ->get();

    // Enkripsi hash untuk setiap quiz berdasarkan ID
    foreach ($quizzes as $quiz) {
        $quiz->hash = Crypt::encryptString($quiz->quizs_id);  // Enkripsi ID untuk digunakan sebagai hash
    }

    // Mengirim data quiz ke view
    return view('user.riwayat_kecermatan', compact('quizzes'));
}


public function getKecermatanData($quiz_hash)
{
    // Dekripsi hash quiz untuk mendapatkan ID asli
    $quiz_id = Crypt::decryptString($quiz_hash); // Mendekripsi hash ke ID asli

    // Pastikan quiz_id valid
    $quiz = Quizs::find($quiz_id);

    if (!$quiz) {
        // Jika tidak ditemukan, kembalikan error atau halaman tidak ditemukan
        return abort(404, 'Quiz tidak ditemukan');
    }

    // Ambil data kecermatan berdasarkan quiz_id dan users_id dari session
    $users_id = session('users_id');
    $kecermatanData = DB::table('kecermatan')
        ->where('users_id', $users_id)
        ->where('quizs_id', $quiz_id)
        ->orderBy('sesi', 'asc') // Mengurutkan berdasarkan sesi
        ->get(['sesi', 'score']);

    // Format data untuk grafik
    $labels = $kecermatanData->pluck('sesi')->toArray();
    $scores = $kecermatanData->pluck('score')->toArray();
// dd( $scores);
    // Return view dengan data untuk grafik
    return view('user.grafik', compact('quiz', 'labels', 'scores'));
}





public function updateShow(Request $request)
{
    $quizs_id = $request->input('quizs_id');
    // Validasi input jika perlu

    // Temukan quiz berdasarkan ID yang didekripsi dan perbarui
    $quiz = Quizs::findOrFail($quizs_id);

    // Cek apakah show_score saat ini 'true' atau 'false', kemudian ubah
    $newStatus = $quiz->show_score === 'true' ? 'false' : 'true';

    // Perbarui nilai show_score
    $quiz->update([
        'show_score' => $newStatus,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Quiz berhasil diubah');
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
            'status' => $request->status,
            'show_score' => 'false'
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
