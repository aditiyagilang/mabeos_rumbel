<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada untuk menggunakan Auth
use Illuminate\Support\Facades\Crypt;

class TypeController extends Controller
{
    public function index()
    {
        // Mengecek apakah pengguna sudah login menggunakan session
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
    
        // Jika sudah login, ambil data types
        $types = Types::all();
    
        // Periksa apakah data types ada
        if ($types->isEmpty()) {
            return redirect()->route('types.index')->with('error', 'No data found.');
        }
    
        // Meng-hash ID dari tipe menggunakan Crypt
        foreach ($types as $type) {
            $type->hash = Crypt::encryptString($type->types_id);
        }
    
    
        return view('admin.tabel-tipe', compact('types')); // Tampilkan data di view
    }
    
    public function create()
    {
        // Mengecek apakah pengguna sudah login
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }

        return view('types.create'); // Tampilkan form untuk membuat type baru
    }

    public function store(Request $request)
    {
        // Mengecek apakah pengguna sudah login
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }

        // Validasi data
        $request->validate([
            'types_name' => 'required|string|max:225',
        ]);

        // Menyimpan type baru ke database
        Types::create([
            'types_name' => $request->types_name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }

    public function edit($id)
    {
        // Mengecek apakah pengguna sudah login
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }

        $type = Types::findOrFail($id); // Menemukan type berdasarkan ID
        return view('types.edit', compact('type')); // Tampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // Mengecek apakah pengguna sudah login
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }

        // Validasi data
        $request->validate([
            'types_name' => 'required|string|max:225',
        ]);

        // Temukan type berdasarkan ID dan update
        $type = Types::findOrFail($id);
        $type->update([
            'types_name' => $request->types_name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type updated successfully.');
    }

    public function destroy($hash)
    {
        // Mendekode hash menjadi ID asli
        $id = Crypt::decryptString($hash);
    
        // Temukan tipe berdasarkan ID yang didekode
        $type = Types::findOrFail($id);
    
        // Hapus tipe
        $type->delete();
    
        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('types.index')->with('success', 'Type deleted successfully.');
    }
    
}
