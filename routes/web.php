<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Tambahkan ini
use App\Http\Controllers\StudentController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute default ke halaman utama (home.blade.php)
Route::get('/', function () {
    return view('home');
});

// Rute otentikasi (login, register, dll.)
Auth::routes();

// Route untuk Admin (Diproteksi oleh middleware 'auth' dan 'is_admin')
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Route untuk Siswa (Diproteksi oleh middleware 'auth' saja)
Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});