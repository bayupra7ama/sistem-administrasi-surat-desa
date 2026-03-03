@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenis-surat.update', $jenisSurat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Jenis Surat<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_surat') is-invalid @enderror"
                                    name="nama_surat" id="inputName" placeholder="" value="{{ $jenisSurat->nama_surat }}"
                                    readonly="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Kode<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                    name="kode" id="inputName" placeholder="" value="{{ $jenisSurat->kode }}"
                                    readonly="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="deskripsi">Deskripsi<span class="text-danger">*</span></label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $jenisSurat->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ route('jenis-surat.index') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
