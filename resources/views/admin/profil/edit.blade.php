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
                    <form action="{{ route('profilDesa.update', $profilDesa) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_kelurahan">Nama Kelurahan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_kelurahan') is-invalid @enderror"
                                    id="nama_kelurahan" name="nama_kelurahan"
                                    value="{{ old('nama_kelurahan', $profilDesa->nama_kelurahan) }}" required>
                                @error('nama_kelurahan')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nama_kepala_desa">Kepala Desa<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_kepala_desa') is-invalid @enderror"
                                    id="nama_kepala_desa" name="nama_kepala_desa"
                                    value="{{ old('nama_kepala_desa', $profilDesa->nama_kepala_desa) }}" required>
                                @error('nama_kepala_desa')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $profilDesa->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="kontak">Kontak<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror"
                                    id="kontak" name="kontak" value="{{ old('kontak', $profilDesa->kontak) }}" required>
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="provinsi">Provinsi<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                    id="provinsi" name="provinsi" value="{{ old('provinsi', $profilDesa->provinsi) }}"
                                    required>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="kabupaten">Kabupaten<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                    id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $profilDesa->kabupaten) }}"
                                    required>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="website">Website<span class="text-danger">*</span></label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror"
                                    id="website" name="website" value="{{ old('website', $profilDesa->website) }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="logo">Logo Desa<span class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    id="logo" name="logo">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                    required>{{ old('alamat', $profilDesa->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg">Simpan Perubahan</button>
                            <a href="{{ route('profilDesa.index') }}" class="btn btn-secondary btn-lg ">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
