@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pengajuan: {{ $pengajuan->jenisSurat->nama_surat }}</h1>
            </div>

            <div class="card">
                <div class="card-body">
                    
                    {{-- ================== INFO AKUN ================== --}}
                    {{-- <h6 class="text-primary mb-3">Informasi Akun Pemohon</h6>
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $pengajuan->user->name }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>NIK</label>
                            <input type="text" class="form-control" value="{{ $pengajuan->user->nik }}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label>No Kartu Keluarga</label>
                            <input type="text" class="form-control" value="{{ $pengajuan->user->kk }}" readonly>
                        </div>
                    </div> --}}

                    <hr>

                    {{-- ================== ISIAN TEKS FORMULIR ================== --}}
                    <h6 class="text-primary mb-3">Data Pengajuan</h6>
                    <div class="row mb-4">
                        @if (!empty($pengajuan->data))
                            @foreach ($pengajuan->data as $key => $value)
                                {{-- Menampilkan inputan berupa teks (mengabaikan file yang berawalan syarat/) --}}
                                @if (is_string($value) && !Str::startsWith($value, 'syarat/'))
                                    <div class="form-group col-md-6">
                                        <label>{{ ucwords(str_replace('_', ' ', $key)) }}</label>
                                        <input type="text" class="form-control" value="{{ $value }}" readonly>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="col-12 text-muted">Tidak ada data isian spesifik.</div>
                        @endif
                    </div>

                    <hr>

                    {{-- ================== BERKAS UPLOAD ================== --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 text-primary">Berkas Lampiran Pengajuan</h6>
                        @if (!empty($pengajuan->data))
                            <a href="{{ route('pengajuan.downloadAll', $pengajuan->id) }}" class="btn btn-success">
                                <i class="fas fa-download"></i> Download Semua PDF
                            </a>
                        @endif
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 60%">Nama Berkas</th>
                                    <th style="width: 35%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($pengajuan->data))
                                    @php $no = 1; @endphp
                                    @foreach ($pengajuan->data as $key => $path)
                                        {{-- Cuma tampilkan data yang merupakan file (awalan syarat/) --}}
                                        @if (is_string($path) && Str::startsWith($path, 'syarat/'))
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords(str_replace(['file_', '_'], ['', ' '], $key)) }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $path) }}" target="_blank" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i> Lihat File
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Tidak ada berkas.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <hr>

                    {{-- ================== TOMBOL AKSI ADMIN ================== --}}
                    {{-- Kalau statusnya sudah di approve/reject, form ini disembunyikan --}}
                    @if($pengajuan->status == 'Menunggu' || $pengajuan->status == 'pending')
                        <h6 class="text-primary mb-3">Status</h6>
                        <div class="row">
                            {{-- Form Setujui --}}
                            <div class="col-md-6 mb-3">
                                <div class="card border-success border">
                                    <div class="card-body">
                                        <h5 class="text-success">Setujui Pengajuan</h5>
                                        <form action="{{ route('pengajuan.approve', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Pesan Persetujuan (Opsional)</label>
                                                <textarea name="pesan_admin" class="form-control" rows="2" placeholder="Cth: Surat sedang dicetak..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Yakin ingin MENYETUJUI pengajuan ini?')">Setujui</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Form Tolak --}}
                            <div class="col-md-6 mb-3">
                                <div class="card border-danger border">
                                    <div class="card-body">
                                        <h5 class="text-danger">Tolak Pengajuan</h5>
                                        <form action="{{ route('pengajuan.reject', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Alasan Penolakan <span class="text-danger">*</span></label>
                                                <textarea name="pesan_admin" class="form-control" rows="2" required placeholder="Cth: KTP buram, tidak terbaca..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Yakin ingin MENOLAK pengajuan ini?')">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- Jika statusnya bukan menunggu (berarti sudah diproses) --}}
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <div>
                                Pengajuan ini sudah berstatus: <strong>{{ strtoupper($pengajuan->status) }}</strong>.<br>
                                Catatan Admin: {{ $pengajuan->pesan_admin ?? 'Tidak ada pesan' }}
                            </div>
                            
                            {{-- TOMBOL PRINT MUNCUL DI SINI JIKA APPROVED --}}
                            @if($pengajuan->status == 'Approved')
                                <a href="{{ route('pengajuan.print', $pengajuan->id) }}" target="_blank" class="btn btn-primary btn-lg">
                                    <i class="fas fa-print"></i> Cetak Surat
                                </a>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection