@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="row">
                @foreach ($jenisSurat as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('pengajuan.form', $item->kode) }}">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ $item->nama_surat }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $item->singkatan }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
