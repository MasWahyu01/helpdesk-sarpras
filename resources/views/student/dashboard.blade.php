@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Laporan Saya</h2>
                    <a href="{{ route('student.tickets.create') }}" class="btn btn-primary">Buat Laporan Baru</a>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if($tickets->isEmpty())
                            <p class="text-center">Anda belum memiliki laporan kerusakan.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->created_at->format('d M Y') }}</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $ticket->status == 'pending' ? 'danger' : ($ticket->status == 'proses' ? 'warning' : 'success') }}">
                                                    {{ ucfirst($ticket->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info text-white">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection