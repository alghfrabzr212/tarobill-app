@extends('layouts.user-master-layout')
@push('css')
    <style>
        
    </style>
@endpush

@section('content')
    <h3>Jadwal pembayaran mendatang</h3>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tagihan</th>
            <th>Jumlah</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jadwal as $i => $tagihan)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $tagihan->nama_tagihan }}</td>
        <td>Rp {{ number_format($tagihan->harga, 0, ',', '.') }}</td>
        <td>{{ \Carbon\Carbon::parse($tagihan->tanggal_jatuh_tempo)->format('d M Y') }}</td>
        <td>
            <span class="badge bg-warning text-dark">{{ $tagihan->status }}</span>
        </td>
    </tr>
@empty
    <tr><td colspan="5" class="text-center">Tidak ada jadwal tagihan.</td></tr>
@endforelse

    </tbody>
</table>
@endsection

@push('js')
    
@endpush