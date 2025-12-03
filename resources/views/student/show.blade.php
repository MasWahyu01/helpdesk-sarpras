@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('student.dashboard') }}" class="btn btn-secondary mb-3">&larr; Kembali ke Dashboard</a>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $ticket->title }}
                    </div>
                    <div class="card-body">
                        <div
                            class="alert alert-{{ $ticket->status == 'pending' ? 'secondary' : ($ticket->status == 'proses' ? 'warning' : 'success') }}">
                            <h5 class="alert-heading">Status: {{ ucfirst($ticket->status) }}</h5>
                            <hr>
                            <p class="mb-0">
                                <strong>Tanggapan Admin:</strong> <br>
                                {{ $ticket->admin_response ?? 'Belum ada tanggapan dari petugas.' }}
                            </p>
                        </div>
                        <hr>
                        <p><strong>Tanggal Lapor:</strong> {{ $ticket->created_at->format('d M Y') }}</p>
                        <p><strong>Kategori:</strong> {{ $ticket->category->name }}</p>
                        <p><strong>Deskripsi Anda:</strong></p>
                        <p class="bg-light p-3 rounded">{{ $ticket->description }}</p>
                        @if($ticket->image)
                            <p><strong>Foto Bukti:</strong></p>
                            <img src="{{ asset('storage/' . $ticket->image) }}" class="img-fluid rounded border"
                                style="max-height: 400px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection