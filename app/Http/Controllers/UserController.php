<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ada form login di view ini
    }

    public function index(Request $request)
    {
        try {
            $quizId = Crypt::decryptString($request->input('qid'));
        } catch (\Exception $e) {
            return redirect()->route('error.page')->with('error', 'Invalid quiz ID.');
        }
    
        $scores = DB::table('scores')
            ->join('users', 'scores.users_id', '=', 'users.users_id')
            ->where('scores.quizs_id', $quizId)
            ->select('scores.*', 'users.*') // Semua kolom dari kedua tabel
          
            ->get();
    
        return view('admin.user-list', compact('scores', 'quizId'));
    }
    
    
    

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    

        $user = User::where('username', $request->username)->first();
    
        if (!$user || !bcrypt($request->password) == $user->password) {
            return redirect()->back()->withErrors(['username' => 'These credentials do not match our records.'])->withInput();
        }
    
        // Jika autentikasi berhasil
        $request->session()->regenerate();
       
        session(['users_id' => $user->users_id, 'img_url' => $user->img_url, 'user_name' => $user->username, 'level' => $user->level]);

        if($user->level == 'Admin'){
    
        return redirect()->route('dashboard.index')->with('status', 'Login successful!');
        }else{
            return redirect()->route('home.index')->with('status', 'Login successful!');
        }
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
            'password' => 'required|string|confirmed',
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
            'level' => 'User',
            'password' => bcrypt($request->password),
        ]);
        // dd();
    
        return redirect()->route('login')->with('status', 'Registration successful. You can now log in.');
    }

    public function getCurrentUser()
    {
        // dd('diapapa');
        $userId = session('users_id');
        $user = User::find($userId);
    
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
    
        return view('admin.profile', compact('user'));
    }
    
    
    public function updateProfile(Request $request)
{
    $userId = session('users_id');
    $user = User::find($userId);   

    if (!$user) {
        return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
    }

    // Validate the input data
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $userId . ',users_id',
        'birthdate' => 'required|date',
        'email' => 'required|string|email|max:255|unique:users,email,' . $userId . ',users_id',
        'telp' => 'required|string|max:14',
    ]);

    // Update the user's data
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->birthdate = $request->input('birthdate');
    $user->email = $request->input('email');
    $user->telp = $request->input('telp');

    // Save the updated user data
    $user->save();

    // Update the name in session after the profile is updated
    session(['user_name' => $user->username]);

    return redirect()->back()->with('status', 'Profil berhasil diperbarui!');
}


public function updatePhoto(Request $request)
{
    // Validasi input
    $request->validate([
        'photo' => 'required|image',
    ]);

    // Ambil user_id dari session
    $userId = session('users_id');
    $user = User::findOrFail($userId);

    // Hapus foto lama jika ada
    if ($user->img_url && file_exists(public_path($user->img_url))) {
        unlink(public_path($user->img_url));
    }

    // Simpan foto baru
    $fileName = time() . '.' . $request->photo->extension();
    $filePath = 'images/users/' . $fileName;
    $request->photo->move(public_path('images/users'), $fileName);

    // Perbarui path foto di database
    $user->img_url = $filePath;
    $user->save();

    // Update img_url di session
    session(['img_url' => $user->img_url]);

    // Kembalikan respons dengan img_url terbaru
    return response()->back(['success' => true, 'img_url' => asset($user->img_url)]);
}


public function updatePassword(Request $request)
{
    // Get the user_id from the session
    $userId = session('users_id');
    
    // Find the user by ID
    $user = User::find($userId);
    // dd($user);
    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    // Validate the inputs
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required', 
    ]);


    if (!bcrypt($request->current_password) === $user->password) {
        dd("Sallaah");
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }

    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect('/login')->with('success', 'Password updated successfully.');
}





}
