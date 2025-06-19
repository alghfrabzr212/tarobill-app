@extends('layouts.user-master-layout')

@push('css')
    <style>
        /* Tambahkan styling khusus jika perlu */
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Tagihan</h2>
        <a href="{{ route('user.tagihan.create') }}" class="btn btn-primary">+ Tambah Tagihan</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Jatuh Tempo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tagihan as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nama_tagihan }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->format('d M Y') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('user.bills.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('user.bills.destroy', $item->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus tagihan ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada tagihan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('js')
    <!-- Tambahkan JS tambahan jika perlu -->
@endpush
