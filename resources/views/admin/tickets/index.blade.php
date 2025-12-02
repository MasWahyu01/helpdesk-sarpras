@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Laporan Masuk</h2>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>Pelapor</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->created_at->format('d M Y') }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->category->name }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $ticket->status == 'pending' ? 'danger' : ($ticket->status == 'proses' ? 'warning' : 'success') }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.tickets.show', $ticket) }}"
                                        class="btn btn-sm btn-info text-white">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection