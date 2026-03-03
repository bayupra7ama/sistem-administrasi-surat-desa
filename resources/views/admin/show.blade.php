@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @php
                            // Cek apakah ada field yang kosong
                            $isIncomplete =
                                empty($penduduk->name) ||
                                empty($penduduk->nik) ||
                                empty($penduduk->kk) ||
                                empty($penduduk->rt) ||
                                empty($penduduk->rw) ||
                                empty($penduduk->dusun);
                        @endphp
                        <div class="col-md-4">
                            @if ($isIncomplete)
                                <div class="badge badge-danger">Belum Lengkap</div>
                            @else
                                <div class="badge badge-success">Lengkap</div>
                            @endif
                            <div class="text-center">
                                @if ($penduduk->photo_path)
                                    <img src="{{ asset('storage/' . $penduduk->photo_path) }}" alt="file_file_foto Penduduk"
                                        class="img-thumbnail rounded-circle" style="width: 150px; height: 150px;">
                                @else
                                    <img src="{{ asset('template/dist/assets/img/avatar/avatar-1.png') }}"
                                        alt="file_file_foto Penduduk" class="img-thumbnail rounded-circle"
                                        style="width: 150px; height: 150px;">
                                @endif
                                <h4 class="mt-3">{{ $penduduk->name }}</h4>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nama:</strong> {{ $penduduk->name }}</p>
                                    <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
                                    <p><strong>Nomor Kartu keluarga:</strong> {{ $penduduk->kk }}</p>
                                    <p><strong>Alamat:</strong> {{ $penduduk->alamat }}</p>



                                </div>
                                <div class="col-md-6">

                                    <p><strong>RT:</strong> {{ $penduduk->rt }}</p>

                                    <strong>RW:</strong> {{ $penduduk->rw }}</>
                                    <p><strong>Dusun:</strong> {{ $penduduk->dusun }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        @if ($isIncomplete)
                            <a href="{{ route('admin.edit', $penduduk->id) }}" class="btn btn-warning">Lengkapi Data</a>
                        @else
                            <a href="{{ route('admin.edit', $penduduk->id) }}" class="btn btn-warning">Edit Data</a>
                        @endif
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
