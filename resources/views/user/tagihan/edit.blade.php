@extends('layouts.user-master-layout')

@section('content')
    <div class="container">
        <h2>Edit Tagihan</h2>

        <form action="{{ route('user.bills.update', $tagihan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
                <input type="text" name="nama_tagihan" class="form-control" value="{{ old('nama_tagihan', $tagihan->nama_tagihan) }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga', $tagihan->harga) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                <input type="date" name="tanggal_jatuh_tempo" class="form-control" value="{{ old('tanggal_jatuh_tempo', \Carbon\Carbon::parse($tagihan->tanggal_jatuh_tempo)->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Belum Lunas" {{ $tagihan->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                    <option value="Lunas" {{ $tagihan->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('user.bills.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
