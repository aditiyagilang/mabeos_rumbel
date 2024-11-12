<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
        
    
        // Menampilkan view dengan data yang telah difilter atau seluruh data
        return view('admin.dashboard');
    }
}