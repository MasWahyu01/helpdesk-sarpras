<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class StudentController extends Controller
{
    public function index()
    {
        // Ambil tiket milik siswa yang sedang login saja
        $tickets = Ticket::where('user_id', auth()->id())->latest()->get();
        
        return view('student.dashboard', compact('tickets'));
    }
}