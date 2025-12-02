<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Tambahkan ini jika belum ada (walaupun Auth::user() bekerja tanpa ini di Laravel 8+)

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home'; // Properti ini dihapus atau dikomentari

    // Ganti redirect berdasarkan role
    protected function redirectTo()
    {
        // Pastikan pengguna sudah terautentikasi sebelum mencoba mengakses 'role'
        if (Auth::check() && auth()->user()->role == 'admin') {
            return route('admin.dashboard');
        }
        
        // Default redirect untuk siswa atau role lainnya
        return route('student.dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}