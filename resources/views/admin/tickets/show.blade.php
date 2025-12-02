@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary mb-3">&larr; Kembali ke Daftar</a>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detail Laporan: {{ $ticket->title }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Pelapor:</strong> {{ $ticket->user->name }} ({{ $ticket->user->email }})</p>
                                <p><strong>Kategori:</strong> {{ $ticket->category->name }}</p>
                                <p><strong>Tanggal Lapor:</strong> {{ $ticket->created_at->format('d M Y H:i') }}</p>
                                <p><strong>Status Saat Ini:</strong>
                                    <span
                                        class="badge bg-{{ $ticket->status == 'pending' ? 'danger' : ($ticket->status == 'proses' ? 'warning' : 'success') }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </p>

                                <hr>
                                <h5>Deskripsi Kerusakan:</h5>
                                <p class="bg-light p-3 border rounded">{{ $ticket->description }}</p>
                            </div>

                            <div class="col-md-6 text-center">
                                <h5>Foto Bukti:</h5>
                                @if($ticket->image)
                                    <img src="{{ asset('storage/' . $ticket->image) }}"
                                        class="img-fluid rounded border shadow-sm" alt="Bukti Kerusakan">
                                @else
                                    <p class="text-muted fst-italic">Tidak ada foto bukti yang dilampirkan.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header bg-dark text-white">Tindak Lanjut & Respon</div>
                    <div class="card-body">
                        <form action="{{ route('admin.tickets.update', $ticket) }}" method="POST">
                            @csrf
                            @method('PUT') <div class="mb-3">
                                <label class="form-label">Update Status</label>
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending
                                        (Menunggu)</option>
                                    <option value="proses" {{ $ticket->status == 'proses' ? 'selected' : '' }}>Proses (Sedang
                                        Dikerjakan)</option>
                                    <option value="selesai" {{ $ticket->status == 'selesai' ? 'selected' : '' }}>Selesai
                                        (Sudah Diperbaiki)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggapan Admin (Opsional)</label>
                                <textarea name="admin_response" class="form-control" rows="3"
                                    placeholder="Berikan tanggapan untuk siswa, misal: 'Akan diperbaiki besok pagi'...">{{ $ticket->admin_response }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection