<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ada form login di view ini
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek kredensial menggunakan username dan password
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('status', 'Login successful!');
        }

        // Jika gagal
        return redirect()->back()->withErrors(['username' => 'These credentials do not match our records.'])->withInput();
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'You have been logged out.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register'); // Pastikan ada form pendaftaran di sini
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'birthdate' => 'required|date',
            'telp' => 'required|string|max:14',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Simpan pengguna baru tanpa verifikasi email
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'telp' => $request->telp,
            'img_url' => 'assets/images_default.png',
            'password' => bcrypt($request->password),
        ]);
        // dd();
    
        return redirect()->route('login')->with('status', 'Registration successful. You can now log in.');
    }
    
}
