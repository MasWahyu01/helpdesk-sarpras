<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket; // Jangan lupa import Model Ticket

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung statistik untuk dashboard
        $totalTickets = Ticket::count();
        $pendingTickets = Ticket::where('status', 'pending')->count();
        $processTickets = Ticket::where('status', 'proses')->count();
        $doneTickets = Ticket::where('status', 'selesai')->count();

        return view('admin.dashboard', compact('totalTickets', 'pendingTickets', 'processTickets', 'doneTickets'));
    }
}