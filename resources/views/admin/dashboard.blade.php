@extends('layouts.master-layout')
@push('css')
    <style>
        
    </style>
@endpush
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-start border-primary border-3">
            <div class="card-body">
                <h5 class="card-title">Jumlah Akun</h5>
                <p class="display-6 fw-bold text-primary">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    
@endpush