<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;

class StudentController extends Controller
{
    /**
     * Menampilkan Dashboard Siswa (Daftar Laporan)
     */
    public function index()
    {
        // Ambil tiket milik siswa yang sedang login saja
        $tickets = Ticket::where('user_id', auth()->id())->latest()->get();
        
        return view('student.dashboard', compact('tickets'));
    }

    /**
     * Menampilkan Form Buat Laporan Baru
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('student.create', compact('categories'));
    }

    /**
     * Memproses Penyimpanan Laporan ke Database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // Proses Upload Gambar (Jika ada)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan di folder: storage/app/public/tickets
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        // Simpan ke Database
        Ticket::create([
            'user_id' => auth()->id(), // ID siswa yang sedang login
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
    public function show(Ticket $ticket)
    {
        // KEAMANAN: Cek apakah tiket ini milik siswa yang sedang login?
        if ($ticket->user_id != auth()->id()) {
            abort(403, 'Anda tidak berhak mengakses laporan ini.');
        }

        return view('student.show', compact('ticket'));
    }
}