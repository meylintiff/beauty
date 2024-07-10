<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\landing\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\perhitungan\HapusAltController;
use App\Http\Controllers\perhitungan\HitungController;
use App\Http\Controllers\perhitungan\IndexController;
use App\Http\Controllers\perhitungan\SimpanAltController;
use App\Http\Controllers\RegisterController;

Route::get('/', [LandingPage::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/public/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
    Route::get('/auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
});

Route::get('/verify-email', [RegisterController::class, 'verifyEmail'])->name('verification.verify');

Route::get('/forgot-password', [PasswordController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [PasswordController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [PasswordController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [PasswordController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register'])->name('register-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');
    Route::post('/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::put('/kriteria/update/{column}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/delete/{column}', [KriteriaController::class, 'delete'])->name('kriteria.delete');

    Route::get('/alternatif', [AlternatifController::class, 'alternatif'])->name('admin.alternatif');
    Route::post('/alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
    Route::put('/alternatif/update/{produk}', [AlternatifController::class, 'update'])->name('alternatif.update');
    Route::delete('/alternatif/delete/{produk}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

    Route::get('/pembobotan', [PembobotanController::class, 'index'])->name('admin.pembobotan');
    Route::post('/pembobotan/store', [PembobotanController::class, 'store'])->name('pembobotan.store');
    Route::put('/pembobotan/update/{bobot}', [PembobotanController::class, 'update'])->name('pembobotan.update');
    Route::delete('/pembobotan/delete/{bobot}', [PembobotanController::class, 'destroy'])->name('pembobotan.destroy');

    Route::get('/akun', [AdminController::class, 'userAll'])->name('admin.akun');
    Route::post('/akun', [AdminController::class, 'store'])->name('akun.store');
    Route::put('/kriteria/update/{id}', [AdminController::class, 'update'])->name('akun.update');
    Route::delete('/kriteria/delete/{id}', [AdminController::class, 'destroy'])->name('akun.delete');

    Route::get('/perhitungan', [IndexController::class, 'show'])->name('admin.perhitungan');
    Route::post('/simpan-pilihan', [SimpanAltController::class, 'simpanAlternatif'])->name('simpan-pilihan');
    Route::post('/hapus-pilihan', [HapusAltController::class, 'hapusPilihan'])->name('hapus-pilihan');
    Route::get('/hasil', [HitungController::class, 'ProdukHitungSAW'])->name('Hitung');
});
