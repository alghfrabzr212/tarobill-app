@extends('layouts.user-master-layout')

@push('css')
    <style>
        .btn-custom:hover {
            background-color: #218838 !important; /* Warna hijau lebih gelap saat hover */
            border-color: #1e7e34 !important;
        }

        .table th.text-center-custom,
        .table td.text-center-custom {
        text-align: center;
        vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;"> {{-- Tambahkan padding di sini --}}
        <h2 class="mb-4">Daftar Tagihan</h2> {{-- Judul utama halaman --}}

        {{-- Tombol Tambah Tagihan --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('user.bills.create') }}" class="btn btn-primary" style="background-color: purple; border-color: purple;">+ Tambah Tagihan</a>
        </div>

        {{-- Bagian untuk Menampilkan Daftar Tagihan dalam Card --}}
        <div class="card mb-4"> {{-- Gunakan class card untuk membungkus --}}
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;"> {{-- Header card --}}
                <h4 class="mb-0">Daftar Tagihan Anda</h4> {{-- Judul di dalam card --}}
            </div>
            <div class="card-body"> {{-- Isi card --}}
                <div class="table-responsive"> {{-- Untuk tabel yang responsif --}}
                    <table class="table table-bordered table-hover"> {{-- Tambahkan table-hover untuk efek hover --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Jatuh Tempo</th>
                                <th class="text-center-custom">Status</th>
                                <th class="text-center-custom">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tagihan as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->nama_tagihan }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->format('d M Y') }}</td>
                                    <td class="text-center-custom">
                                        <span class="badge {{ $item->status == 'Lunas' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="text-center-custom">
                                        <a href="{{ route('user.bills.edit', $item->id) }}" class="btn btn-sm btn-custom me-2" style="background-color: #28a745; border-color: #28a745;">Edit</a>
                                        <form action="{{ route('user.bills.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')" style="background-color: #dc3545; border-color: #dc3545;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada tagihan yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Akhir Bagian Daftar Tagihan dalam Card --}}
@endsection

@push('js')
    <!-- Tambahkan JS tambahan jika perlu -->
@endpush
