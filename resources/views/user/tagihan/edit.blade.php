@extends('layouts.user-master-layout')

@section('content')
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;"> {{-- Tambahkan padding di sini --}}
        <h2 class="mb-4">Edit Tagihan</h2> {{-- Judul utama halaman --}}

        {{-- Bagian untuk Form Edit Tagihan dalam Card --}}
        <div class="card mb-4"> {{-- Gunakan class card untuk membungkus --}}
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;"> {{-- Header card --}}
                <h4 class="mb-0">Form Edit Tagihan</h4> {{-- Judul di dalam card --}}
            </div>
            <div class="card-body"> {{-- Isi card --}}
                <form action="{{ route('user.bills.update', $tagihan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                        <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" value="{{ old('nama_tagihan', $tagihan->nama_tagihan) }}" required>
                        @error('nama_tagihan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Jumlah (Rp)</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $tagihan->harga) }}" required min="0">
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ old('tanggal_jatuh_tempo', $tagihan->tanggal_jatuh_tempo->format('Y-m-d')) }}" required>
                        @error('tanggal_jatuh_tempo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Belum Lunas" {{ old('status', $tagihan->status) == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                            <option value="Lunas" {{ old('status', $tagihan->status) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: purple; border-color: purple;">Update Tagihan</button>
                    <a href="{{ route('user.bills.index') }}" class="btn btn-secondary btn-modal-batal">Batal</a>
                </form>
            </div>
        </div>
        {{-- Akhir Bagian Form Edit Tagihan dalam Card --}}

    </div>
@endsection

