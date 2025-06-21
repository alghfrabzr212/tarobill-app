@extends('layouts.user-master-layout')
@push('css')
    <style>
        
    </style>
@endpush

@section('content')
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px;"> {{-- Tambahkan padding di sini --}}
        <h2 class="mb-4">Riwayat Tagihan</h2> {{-- Judul utama halaman --}}

        {{-- Bagian untuk Menampilkan Riwayat Tagihan dalam Card --}}
        <div class="card mb-4"> {{-- Gunakan class card untuk membungkus --}}
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;"> {{-- Header card --}}
                <h4 class="mb-0">Daftar Riwayat Tagihan Anda</h4> {{-- Judul di dalam card --}}
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
                                {{-- Kolom aksi mungkin tidak diperlukan di riwayat --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->nama_tagihan }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $item->status == 'Lunas' ? 'bg-success' : 'bg-secondary' }}"> {{-- Gunakan bg-secondary atau bg-danger untuk status selain Lunas di Riwayat --}}
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada riwayat tagihan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Akhir Bagian Riwayat Tagihan dalam Card --}}

    </div>
@endsection

@push('js')
    
@endpush