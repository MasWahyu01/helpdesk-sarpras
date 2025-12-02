@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard Admin Sarpras</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Laporan</div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $totalTickets }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Perlu Tindakan</div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $pendingTickets }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Sedang Diproses</div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $processTickets }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Selesai</div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $doneTickets }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection