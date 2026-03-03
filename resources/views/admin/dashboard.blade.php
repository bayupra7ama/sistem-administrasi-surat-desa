@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('penduduk.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Penduduk</h4>
                                </div>
                                <div class="card-body">
                                    {{ $penduduk }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               
               
               
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.pengajuan.riwayat', ['search' => 'Approved']) }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Disetujui</h4>
                                </div>
                                <div class="card-body">
                                    {{ $approvedCount }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.pengajuan.riwayat', ['search' => 'Rejected']) }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Ditolak</h4>
                                </div>
                                <div class="card-body">
                                    {{ $rejectedCount }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.pengajuan.riwayat', ['search' => 'Menunggu']) }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Menunggu</h4>
                                </div>
                                <div class="card-body">
                                    {{ $waitingCount }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
