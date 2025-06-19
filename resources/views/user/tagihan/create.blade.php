@extends('layouts.user-master-layout')

@section('content')
    <h2>Tambah Tagihan</h2>
    <form action="{{ route('user.bills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
            <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Jumlah (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_jatuh_tempo" class="form-label">Jatuh Tempo</label>
            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending">Belum Dibayar</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('user.bills.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
