@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('waktu-pelayanan.update', $waktuPelayanan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputName">Hari<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('hari') is-invalid @enderror"
                                    name="hari" id="inputName" placeholder="" value="{{ $waktuPelayanan->hari }}"
                                    readonly="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jam_buka">Jam Buka<span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('jam_buka') is-invalid @enderror"
                                    name="jam_buka" id="jam_buka" value="{{ $waktuPelayanan->jam_buka }}">
                                @error('jam_buka')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jam_tutup">Jam Tutup<span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('jam_tutup') is-invalid @enderror"
                                    name="jam_tutup" id="jam_tutup" value="{{ $waktuPelayanan->jam_tutup }}">
                                @error('jam_tutup')
                                    <div class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="{{ route('waktu-pelayanan.index') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
