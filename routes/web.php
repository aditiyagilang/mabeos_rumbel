<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\DetailQuizController;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswerController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/user-list', [UserController::class, 'index'])->name('index.user-list');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('home', [HomeController::class, 'index'])->name('home.index');



Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('get-quiz-scores/{quizId}', [DashboardController::class, 'getQuizScores'])->name('dashboard.getQuizScores');




Route::get('types', [TypeController::class, 'index'])->name('types.index');
Route::get('types/create', [TypeController::class, 'create'])->name('types.create');
Route::post('types', [TypeController::class, 'store'])->name('types.store');
Route::get('types/{hash}/edit', [TypeController::class, 'edit'])->name('types.edit');
Route::put('types/{hash}', [TypeController::class, 'update'])->name('types.update');
Route::delete('types/{hash}', [TypeController::class, 'destroy'])->name('types.destroy');


Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('quizzesPenilaian', [QuizController::class, 'indexPenilaian'])->name('quizzes.indexPenilaian');
Route::get('/quizzesKecermatan', [QuizController::class, 'indexKuisKecermatan'])->name('quizzes.indexKecermatan');
Route::get('quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
Route::post('quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('quizzes/{hash}', [QuizController::class, 'show'])->name('quizzes.show');
Route::get('quizzes/{hash}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{hash}', [QuizController::class, 'update'])->name('quizzes.update');
Route::put('/quizzesShow/{hash}', [QuizController::class, 'updateShow'])->name('quizzes.updateShow');
Route::delete('/quizzes/{hash}', [QuizController::class, 'destroy'])->name('quizzes.destroy');
// Di file routes/web.php
Route::get('/{quiz_hash}', [QuizController::class, 'getKecermatanData'])->name('grafik.show');



Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{hash}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('questions/{hash}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');



Route::get('scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('/riwayat-skor', [ScoreController::class, 'indexUser'])->name('scores.indexUser');
Route::get('scores/create', [ScoreController::class, 'create'])->name('scores.create');
Route::post('scores', [ScoreController::class, 'store'])->name('scores.store');
Route::get('scores/{id}', [ScoreController::class, 'show'])->name('scores.show');
Route::get('scores/{id}/edit', [ScoreController::class, 'edit'])->name('scores.edit');
Route::put('scores/{id}', [ScoreController::class, 'update'])->name('scores.update');
Route::delete('scores/{id}', [ScoreController::class, 'destroy'])->name('scores.destroy');

// Route untuk DetailQuizController
Route::get('detail', [DetailQuizController::class, 'index'])->name('details.index');
Route::get('details', [DetailQuizController::class, 'questions'])->name('details.questions');
Route::get('details/create', [DetailQuizController::class, 'create'])->name('details.create');
Route::post('details', [DetailQuizController::class, 'store'])->name('details.store');
Route::get('details/{id}', [DetailQuizController::class, 'show'])->name('details.show');
Route::get('details/{id}/edit', [DetailQuizController::class, 'edit'])->name('details.edit');
Route::put('details/{id}', [DetailQuizController::class, 'update'])->name('details.update');
Route::delete('details/{id}', [DetailQuizController::class, 'destroy'])->name('details.destroy');
Route::post('/save-questions', [DetailQuizController::class, 'simpanPertanyaan'])->name('simpan.pertanyaan');



Route::get('choose', [ChooseController::class, 'index'])->name('choose.index');
Route::get('choose/create', [ChooseController::class, 'create'])->name('choose.create');
Route::post('choose', [ChooseController::class, 'store'])->name('choose.store');
Route::get('choose/{id}', [ChooseController::class, 'show'])->name('choose.show');
Route::get('choose/{id}/edit', [ChooseController::class, 'edit'])->name('choose.edit');
Route::put('choose/{id}', [ChooseController::class, 'update'])->name('choose.update');
Route::delete('choose/{id}', [ChooseController::class, 'destroy'])->name('choose.destroy');


Route::get('/profile', [UserController::class, 'getCurrentUser'])->name('user.profile');
Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::post('/update-photo', [UserController::class, 'updatePhoto'])->name('user.updatePhoto');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');



Route::post('/answer', [AnswerController::class, 'index'])->name('index.answer');
Route::post('/authtoken', [AnswerController::class, 'authtoken'])->name('validate.token');
// Route::post('/authtoken', [AnswerController::class, 'authtoken'])->name('validate.token');
Route::post('/start-quiz', [AnswerController::class, 'startQuiz'])->name('answer.startQuiz');
// Route untuk update jawaban
// Route::post('/update-answer', [AnswerController::class, 'updateAnswer'])->name('submit.quiz');
// Route::post('/answers', [AnswerController::class, 'updateAnswers'])->name('quiz.updateAnswers');
Route::post('/updateAnswers', [AnswerController::class, 'updateAnswers'])->name('quiz.updateAnswers');
Route::post('/toggle-score', [AnswerController::class, 'toggleScore'])->name('answers.toggleScore');

Route::post('/finish-quiz', [AnswerController::class, 'finishQuiz'])->name('quiz.finish');
Route::post('/update-score', [AnswerController::class, 'updateScore'])->name('update.score');

Route::post('/update-scorePlus', [AnswerController::class, 'updateScorePlus'])->name('update.scorePlus');
Route::post('/incrementAnswers', [AnswerController::class, 'incrementAnswers'])->name('update.incrementAnswers');
Route::get('/answer', [AnswerController::class, 'index2'])->name('answer.index');


// Route::get('/riwayat_kecermatan', function () {
//     return view('user.riwayat_kecermatan');
// });
// routes/web.php
Route::get('/get-scores', [ScoreController::class, 'getScoresData']);


Route::get('/pemberitahuan', function () {
    return view('user.pemberitahuan');
})->name('user.pemberitahuan');



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

Route::get('/tes', function () {
    return view('tes');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/tabel-user', function () {
    return view('tabel-user');
});
Route::get('/Home_user', function () {
    return view('user.Home_user');
});
// Route::get('/riwayat-skor', function () {
//     return view('user.riwayat-skor');
// });
Route::get('/profile-user', function () {
    return view('profile-user');
});
Route::get('/kuis-cpns', function () {
    return view('user.kuis-cpns');
});
Route::get('/kuis-kecerdasan', function () {
    return view('user.kuis-kecerdasan');
});
Route::get('/grafik', function () {
    return view('user.grafik');
});
