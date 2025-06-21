@extends('layouts.user-master-layout') {{-- Pastikan ini mengarah ke layout master Anda yang benar --}}

@push('css')
    <style>
        /* Tambahkan CSS spesifik jika ada */
    </style>
@endpush

@section('content')
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;">
        <h2 class="mb-4">Tambah Tagihan Baru</h2>

        {{-- Bagian untuk Form Tambah Tagihan dalam Card --}}
        <div class="card mb-4">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <h4 class="mb-0">Form Tambah Tagihan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('user.bills.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                        <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" value="{{ old('nama_tagihan') }}" required>
                        @error('nama_tagihan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Jumlah (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required min="0">
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ old('tanggal_jatuh_tempo') }}" required>
                        @error('tanggal_jatuh_tempo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            {{-- Perhatikan bahwa di controller Anda, status default adalah 'Belum Lunas'. --}}
                            {{-- Jika Anda ingin user bisa memilih dari awal, pastikan ini sesuai dengan opsi di DB. --}}
                            <option value="Belum Lunas" {{ old('status') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                            <option value="Lunas" {{ old('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: purple; border-color: purple;">Simpan Tagihan</button>
                    <a href="{{ route('user.bills.index') }}" class="btn btn-secondary btn-modal-batal">Batal</a>
                </form>
            </div>
        </div>
        {{-- Akhir Bagian Form Tambah Tagihan dalam Card --}}

    </div>
@endsection

@push('js')
    {{-- Tambahkan JS spesifik jika ada --}}
@endpush