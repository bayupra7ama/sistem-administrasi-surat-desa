@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1 class="display-4 text-center">{{ $title }}</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center mx-auto">
                            @if ($profilDesa->logo)
                                <img src="{{ asset('storage/' . $profilDesa->logo) }}" alt="Logo Desa"
                                    class="img-thumbnail " style="width: 150px; height: 150px;">
                            @else
                                <img src="{{ asset('template/dist/assets/img/avatar/avatar-2.png') }}" alt="Logo Desa"
                                    class="img-thumbnail " style="width: 150px; height: 150px;">
                            @endif
                            <h4 class="mt-3" style="font-size: 1.5rem;">{{ $profilDesa->nama_kelurahan }}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6  flex flex-auto">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Kepala Desa:</strong></td>
                                        <td>{{ $profilDesa->nama_kepala_desa }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td>{{ $profilDesa->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kontak:</strong></td>
                                        <td>{{ $profilDesa->kontak }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Provinsi:</strong></td>
                                        <td>{{ $profilDesa->provinsi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Kabupaten:</strong></td>
                                        <td>{{ $profilDesa->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat:</strong></td>
                                        <td>{{ $profilDesa->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Website:</strong></td>
                                        <td><a href="{{ $profilDesa->website }}"
                                                target="_blank">{{ $profilDesa->website }}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p><strong>Terakhir Kali Diedit:</strong> {{ $profilDesa->updated_at->format('d-m-Y H:i') }}</p>
                        <a href="{{ route('profilDesa.edit', $profilDesa->id) }}" class="btn btn-warning btn-lg">Edit
                            Profil</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
