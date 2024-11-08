<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('types', [TypeController::class, 'index'])->name('types.index');
Route::get('types/create', [TypeController::class, 'create'])->name('types.create');
Route::post('types', [TypeController::class, 'store'])->name('types.store');
Route::get('types/{hash}/edit', [TypeController::class, 'edit'])->name('types.edit');
Route::put('types/{hash}', [TypeController::class, 'update'])->name('types.update');
Route::delete('types/{hash}', [TypeController::class, 'destroy'])->name('types.destroy');


Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
Route::post('quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('quizzes/{hash}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('quizzes/{hash}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{hash}', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{hash}', [QuizController::class, 'destroy'])->name('quizzes.destroy');


Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{hash}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('questions/{hash}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');



Route::get('scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('scores/create', [ScoreController::class, 'create'])->name('scores.create');
Route::post('scores', [ScoreController::class, 'store'])->name('scores.store');
Route::get('scores/{id}', [ScoreController::class, 'show'])->name('scores.show');
Route::get('scores/{id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
Route::put('scores/{id}', [ScoreController::class, 'update'])->name('scores.update');
Route::delete('scores/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');



Route::get('/tabel-skor', function () {
    return view('admin.tabel-skor');
});

Route::get('/tabel-pertanyaan', function () {
    return view('admin.tabel-pertanyaan');
});
Route::get('/tabel-kuis', function () {
    return view('admin.tabel-kuis');
});
Route::get('/tabel-detail-kuis', function () {
    return view('admin.tabel-detail-kuis');
});
Route::get('/tabel-lihat-pertanyaan', function () {
    return view('tabel-lihat-pertanyaan');
});
Route::get('/tabel-opsi-jawaban', function () {
    return view('tabel-opsi-jawaban');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/tes', function () {
    return view('admin.tes');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/tabel-user', function () {
    return view('tabel-user');
});
