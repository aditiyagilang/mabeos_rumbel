<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use App\Models\Scores;
use App\Models\Quizs;
use App\Models\User;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('users_id')) {
            return redirect()->route('login')->with('error', 'You need to login first!');
        }
        
        $startCount = Quizs::where('status', 'start')->count();
        $ongoingCount = Quizs::where('status', 'on going')->count();
        $endCount = Quizs::where('status', 'end')->count();

        $userCount = User::where('level', 'User')->count();
        $ongoingQuizzes = Quizs::where('status', 'on going')->get();

        // All quizzes, latest quiz, and scores for it
        $quizzes = Quizs::orderBy('quizs_id', 'desc')->get();
        $quizzesl =Quizs::where('status', 'on going')->get();
        $latestQuiz = $quizzesl->first();
        $scores = $latestQuiz ? Scores::where('quizs_id', $latestQuiz->quizs_id)->pluck('score') : collect([]);
        // dd($scores);
        return view('admin.dashboard', [
            'startCount' => $startCount,
            'ongoingCount' => $ongoingCount,
            'endCount' => $endCount,
            'userCount' => $userCount,
            'ongoingQuizzes' => $ongoingQuizzes,
            'quizzes' => $quizzes,
            'latestQuiz' => $latestQuiz,
            'scores' => $scores,
        ]);
    }
    
    public function getQuizScores($quizId)
    {
        $scores = Scores::where('quizs_id', $quizId)->pluck('score');

        return response()->json([
            'scores' => $scores
        ]);
    }

    

}