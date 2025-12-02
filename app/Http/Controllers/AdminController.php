<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket; 

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

    public function tickets()
    {
        // Ambil semua data tiket, urutkan dari yang terbaru
        // with(['user', 'category']) digunakan agar loading data lebih ringan (Eager Loading)
        $tickets = Ticket::with(['user', 'category'])->latest()->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        // Menampilkan halaman detail tiket
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Update status tiket dan respon admin.
     */
    public function update(Request $request, Ticket $ticket)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
            'admin_response' => 'nullable|string'
        ]);

        // Update data tiket di database
        $ticket->update([
            'status' => $request->status,
            'admin_response' => $request->admin_response
        ]);

        // Redirect kembali ke halaman daftar tiket dengan pesan sukses
        return redirect()->route('admin.tickets.index')->with('success', 'Status tiket berhasil diperbarui!');
    }
}