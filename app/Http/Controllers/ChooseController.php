<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendekripsi 'questions_id' yang diterima dari URL
        $questionId = $request->input('questions_id');
        
        if ($questionId) {
            // Mendekripsi 'questions_id'
            $questionId = Crypt::decryptString($questionId);
    
            // Mengambil data dari tabel 'choose' berdasarkan 'questions_id'
            $chooses = Choose::where('questions_id', $questionId)->get();
        } else {
            // Jika tidak ada 'questions_id', ambil semua data 'choose'
            $chooses = Choose::all();
        }
    
        // Menyamar ID untuk setiap choose
        foreach ($chooses as $choose) {
            $choose->encrypted_id = Crypt::encryptString($choose->choose_id);
        }
    
        // Menampilkan view dengan data yang telah difilter atau seluruh data
        return view('admin.tabel-opsi-jawaban', compact('chooses', 'questionId'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah data baru
        $questions = Questions::all(); // Ambil semua data pertanyaan
        return view('choose.create', compact('questions')); // Menampilkan form dengan data pertanyaan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'answers' => 'required|string|max:255', // Validasi untuk answers
            'questions_id' => 'required|exists:questions,questions_id', // Validasi untuk questions_id yang ada di tabel questions
        ]);

        // Menyimpan data baru
        $choose = Choose::create([
            'answers' => $validated['answers'],
            'questions_id' => $validated['questions_id'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encrypted_id)
    {
        // Mendekripsi ID yang disamarkan
        $id = Crypt::decryptString($encrypted_id);
        
        // Menampilkan data berdasarkan id
        $choose = Choose::findOrFail($id); // Mengambil data berdasarkan id
        return view('choose.show', compact('choose')); // Menampilkan data di view show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mendekripsi ID yang diterima dari URL
        $chooseId = Crypt::decryptString($id);
    
        // Mengambil data berdasarkan ID
        $choose = Choose::findOrFail($chooseId);
    
        // Mengirimkan data ke view
        return view('choose.edit', compact('choose'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mendekripsi ID yang diterima dari URL
        $chooseId = Crypt::decryptString($id);

        // Validasi input
        $validated = $request->validate([
            'answers' => 'required|string|max:255',
        ]);

        // Mengambil data yang akan diperbarui
        $choose = Choose::findOrFail($chooseId);

        // Update data choose
        $choose->update([
            'answers' => $validated['answers'],
        ]);

        return redirect()->route('choose.index')->with('success', 'Jawaban berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encrypted_id)
    {
        // Mendekripsi ID yang disamarkan
        $id = Crypt::decryptString($encrypted_id);
        // dd($id);
        // Menghapus data berdasarkan id
        $choose = Choose::findOrFail($id);
        $choose->delete(); // Menghapus data

        return redirect()->route('choose.index')->with('success', 'Data berhasil dihapus.');
    }
}
