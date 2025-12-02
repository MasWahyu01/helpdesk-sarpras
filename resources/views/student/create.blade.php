@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buat Laporan Kerusakan Baru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('student.tickets.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Judul Laporan</label>
                                <input type="text" name="title" class="form-control" required
                                    placeholder="Contoh: AC Kelas X TKJ 1 Bocor">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Lengkap</label>
                                <textarea name="description" class="form-control" rows="4" required
                                    placeholder="Jelaskan detail kerusakan dan lokasi tepatnya..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Bukti (Opsional)</label>
                                <input type="file" name="image" class="form-control">
                                <div class="form-text">Format: JPG, PNG. Maksimal 2MB.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                            <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection