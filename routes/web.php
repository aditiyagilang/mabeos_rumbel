<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/resend', [EmailVerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.resend');



    Route::get('types/{hash}/edit', [TypeController::class, 'edit'])->name('types.edit');
    Route::put('types/{hash}', [TypeController::class, 'update'])->name('types.update');
    Route::delete('types/{hash}', [TypeController::class, 'destroy'])->name('types.destroy');

Route::get('/tabel-skor', function () {
    return view('tabel-skor');
});
Route::get('/tabel-tipe', function () {
    return view('tabel-tipe');
});
Route::get('/tabel-pertanyaan', function () {
    return view('tabel-pertanyaan');
});
Route::get('/tabel-kuis', function () {
    return view('tabel-kuis');
});
Route::get('/tabel-detail-kuis', function () {
    return view('tabel-detail-kuis');
});
Route::get('/tes', function () {
    return view('tes');
});
