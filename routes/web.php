<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute default ke halaman utama (home.blade.php)
Route::get('/', function () {
    return view('home');
});

// Rute otentikasi (login, register, dll.)
Auth::routes();

// Route untuk Admin (Diproteksi oleh middleware 'auth' dan 'is_admin')
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Route untuk melihat daftar tiket
    Route::get('/admin/tickets', [AdminController::class, 'tickets'])->name('admin.tickets.index');
    
    // Route untuk melihat detail tiket spesifik
    Route::get('/admin/tickets/{ticket}', [AdminController::class, 'show'])->name('admin.tickets.show');

    // BARU: Route untuk memproses update status tiket
    Route::put('/admin/tickets/{ticket}', [AdminController::class, 'update'])->name('admin.tickets.update');
});

// Route untuk Siswa (Diproteksi oleh middleware 'auth' saja)
Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/tickets/create', [StudentController::class, 'create'])->name('student.tickets.create');
    Route::post('/student/tickets', [StudentController::class, 'store'])->name('student.tickets.store');
});