@extends('layouts.user-master-layout') {{-- Pastikan ini mengarah ke layout master Anda yang benar --}}

@push('css')
    <style>
        /* Tambahkan CSS spesifik dashboard di sini jika ada */
    </style>
@endpush

@section('content')
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;"> {{-- Tambahkan padding di sini --}}
        <h2 class="mb-4">Jadwal Tagihan Mendatang</h2> {{-- Judul utama halaman --}}

        {{-- Bagian untuk Menampilkan Jadwal Tagihan dalam Card --}}
        <div class="card mb-4"> {{-- Gunakan class card untuk membungkus --}}
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;"> {{-- Header card --}}
                <h4 class="mb-0">Daftar Tagihan Mendatang Anda</h4> {{-- Judul di dalam card --}}
            </div>
            <div class="card-body"> {{-- Isi card --}}
                <div class="table-responsive"> {{-- Untuk tabel yang responsif --}}
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                                {{-- Kolom aksi mungkin tidak diperlukan di jadwal --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwal as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->nama_tagihan }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark"> {{-- Contoh badge untuk jadwal --}}
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada tagihan yang akan datang.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Akhir Bagian Jadwal Tagihan dalam Card --}}

    </div>
@endsection

@push('js')
    {{-- Tambahkan JS spesifik dashboard di sini jika ada --}}
@endpush