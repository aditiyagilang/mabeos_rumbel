<?php

namespace App\Http\Controllers;

use App\Models\Type; // Pastikan Anda sudah membuat model Type
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data types
        $types = Type::all();
        return view('types.index', compact('types')); // Tampilkan data di view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create'); // Tampilkan form untuk membuat type baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'types_name' => 'required|string|max:225',
        ]);

        // Menyimpan type baru ke database
        Type::create($request->only('types_name'));

        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('types.show', compact('type')); // Tampilkan detail type
    }

    public function edit(string $hash)
    {
        $type = Type::findOrFail(Type::getIdFromHash($hash));
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $hash)
    {
        $type = Type::findOrFail(Type::getIdFromHash($hash));

        $request->validate([
            'types_name' => 'required|string|max:225',
        ]);

        $type->update($request->only('types_name'));

        return redirect()->route('types.index')->with('success', 'Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $hash)
    {
        $type = Type::findOrFail(Type::getIdFromHash($hash));
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type deleted successfully.');
    }
}
