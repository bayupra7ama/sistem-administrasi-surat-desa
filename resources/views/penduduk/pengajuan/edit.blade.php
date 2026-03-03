@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Perbaiki Pengajuan: {{ $jenisSurat->nama_surat }}</h1>
            </div>

            @if($pengajuan->pesan_admin)
                <div class="alert alert-danger">
                    <strong>Pesan Penolakan dari Desa:</strong><br>
                    {{ $pengajuan->pesan_admin }}
                </div>
            @endif

            <div class="card border-warning">
                <div class="card-header">
                    <h4 class="text-warning"><i class="fas fa-exclamation-triangle"></i> Silakan Perbaiki Data Anda</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('penduduk.pengajuan.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Field Berdasarkan Jenis Surat --}}
                        @switch($jenisSurat->kode)
                            
                            {{-- ============================== SKD ============================== --}}
                            @case('SKD')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $isian['tempat_lahir'] ?? '') }}" required></div>
                                <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $isian['tanggal_lahir'] ?? '') }}" required></div>
                                <div class="form-group"><label>Jenis Kelamin</label><input type="text" name="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) }}" required></div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara" class="form-control" value="{{ old('warga_negara', $isian['warga_negara'] ?? 'Indonesia') }}" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat (Sertakan RT/RW & Dusun)</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                <div class="form-group"><label>Tujuan Pembuatan Surat</label><input type="text" name="tujuan_surat" class="form-control" value="{{ old('tujuan_surat', $isian['tujuan_surat'] ?? '') }}" required></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KK</label>
                                    <input type="file" name="file_kk" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload KTP</label>
                                    <input type="file" name="file_ktp" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar RT</label>
                                    <input type="file" name="surat_pengantar_rt" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['surat_pengantar_rt'])) <br><a href="{{ asset('storage/'.$isian['surat_pengantar_rt']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                            @break

                            {{-- ============================== SD ============================== --}}
                            @case('SD')
                                <h6 class="text-primary mt-3">Data Diri & Kegiatan</h6>
                                <div class="form-group"><label>Nama Lengkap / Peserta</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Tujuan Surat</label><input type="text" name="tujuan_surat" class="form-control" value="{{ old('tujuan_surat', $isian['tujuan_surat'] ?? '') }}" required></div>
                                <div class="form-group"><label>Nama Kegiatan</label><input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $isian['nama_kegiatan'] ?? '') }}" required></div>
                                <div class="form-group"><label>Tempat Kegiatan</label><input type="text" name="tempat_kegiatan" class="form-control" value="{{ old('tempat_kegiatan', $isian['tempat_kegiatan'] ?? '') }}" required></div>
                                <div class="form-group"><label>Waktu Pelaksanaan</label><input type="text" name="waktu_kegiatan" class="form-control" value="{{ old('waktu_kegiatan', $isian['waktu_kegiatan'] ?? '') }}" required></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KK</label>
                                    <input type="file" name="file_kk" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                            @break

                            {{-- ============================== SKTM ============================== --}}
                            @case('SKTM')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Tempat, Tanggal Lahir</label><input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{ old('tempat_tanggal_lahir', $isian['tempat_tanggal_lahir'] ?? '') }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara" class="form-control" value="{{ old('warga_negara', $isian['warga_negara'] ?? 'WNI') }}" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                <div class="form-group"><label>Tujuan / Keperluan Surat</label><input type="text" name="tujuan_surat" class="form-control" value="{{ old('tujuan_surat', $isian['tujuan_surat'] ?? '') }}" required></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KK</label><input type="file" name="file_kk" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload KTP</label><input type="file" name="file_ktp" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar RT</label><input type="file" name="surat_pengantar_rt" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['surat_pengantar_rt'])) <br><a href="{{ asset('storage/'.$isian['surat_pengantar_rt']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                            @break

                            {{-- ============================== SPIK ============================== --}}
                            @case('SPIK')
                                <h6 class="text-primary mt-3">Data Diri (Tuan Rumah)</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Umur (Tahun)</label><input type="number" name="umur" class="form-control" value="{{ old('umur', $isian['umur'] ?? '') }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Alamat Lengkap</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>

                                <h6 class="text-primary mt-4">Detail Keramaian</h6>
                                <div class="form-group"><label>Jenis Acara</label><input type="text" name="jenis_acara" class="form-control" value="{{ old('jenis_acara', $isian['jenis_acara'] ?? '') }}" required></div>
                                <div class="form-group"><label>Detail Acara & Waktu</label><input type="text" name="detail_acara" class="form-control" value="{{ old('detail_acara', $isian['detail_acara'] ?? '') }}" required></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KK</label><input type="file" name="file_kk" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload KTP</label><input type="file" name="file_ktp" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar RT</label><input type="file" name="surat_pengantar_rt" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['surat_pengantar_rt'])) <br><a href="{{ asset('storage/'.$isian['surat_pengantar_rt']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                            @break

                            {{-- ============================== SKU ============================== --}}
                            @case('SKU')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Tempat / Tanggal Lahir</label><input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{ old('tempat_tanggal_lahir', $isian['tempat_tanggal_lahir'] ?? '') }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Jenis Kelamin</label><input type="text" name="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) }}" required></div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara" class="form-control" value="{{ old('warga_negara', $isian['warga_negara'] ?? 'WNI') }}" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>

                                <h6 class="text-primary mt-4">Data Usaha</h6>
                                <div class="form-group"><label>Nama Usaha</label><input type="text" name="nama_usaha" class="form-control" value="{{ old('nama_usaha', $isian['nama_usaha'] ?? '') }}" required></div>
                                <div class="form-group"><label>Alamat Usaha</label><textarea name="alamat_usaha" class="form-control" required>{{ old('alamat_usaha', $isian['alamat_usaha'] ?? '') }}</textarea></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KTP</label><input type="file" name="file_ktp" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Upload KK</label><input type="file" name="file_kk" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar RT</label><input type="file" name="surat_pengantar_rt" class="form-control">
                                    <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                    @if(isset($isian['surat_pengantar_rt'])) <br><a href="{{ asset('storage/'.$isian['surat_pengantar_rt']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                </div>
                            @break

                            {{-- ============================== SPP ============================== --}}
                            @case('SPP')
                                <h6 class="text-primary mt-3 border-bottom pb-2">Data Diri & Kepindahan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nomor KK</label><input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $isian['no_kk'] ?? $penduduk->kk) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nama Kepala Keluarga</label><input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ old('nama_kepala_keluarga', $isian['nama_kepala_keluarga'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat Sekarang</label><textarea name="alamat_sekarang" class="form-control" required>{{ old('alamat_sekarang', $isian['alamat_sekarang'] ?? $penduduk->alamat) }}</textarea></div>
                                    <div class="form-group col-md-12"><label>Alamat Tujuan Pindah</label><textarea name="alamat_tujuan" class="form-control" required>{{ old('alamat_tujuan', $isian['alamat_tujuan'] ?? '') }}</textarea></div>
                                    <div class="form-group col-md-6"><label>Jumlah Keluarga yang Pindah</label><input type="number" name="jumlah_pindah" class="form-control" value="{{ old('jumlah_pindah', $isian['jumlah_pindah'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Upload KK</label><input type="file" name="file_kk" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tak diubah.</small>
                                        @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Upload KTP</label><input type="file" name="file_ktp" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tak diubah.</small>
                                        @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Upload Buku Nikah</label><input type="file" name="file_buku_nikah" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tak diubah.</small>
                                        @if(isset($isian['file_buku_nikah'])) <br><a href="{{ asset('storage/'.$isian['file_buku_nikah']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                </div>
                            @break

                            {{-- ============================== SKIA ============================== --}}
                            @case('SKIA')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Anak</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Anak</label><input type="text" name="nama_anak" class="form-control" value="{{ old('nama_anak', $isian['nama_anak'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK Anak</label><input type="text" name="nik_anak" class="form-control" value="{{ old('nik_anak', $isian['nik_anak'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>No. KK</label><input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $isian['no_kk'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>No. Akta Kelahiran</label><input type="text" name="no_akta" class="form-control" value="{{ old('no_akta', $isian['no_akta'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $isian['tempat_lahir'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $isian['tanggal_lahir'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Orang Tua & Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ayah</label><input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $isian['nama_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $isian['nama_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Nama Pemohon</label><input type="text" name="nama_pemohon" class="form-control" value="{{ old('nama_pemohon', $isian['nama_pemohon'] ?? $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Permohonan</label><input type="date" name="tanggal_permohonan" class="form-control" value="{{ old('tanggal_permohonan', $isian['tanggal_permohonan'] ?? date('Y-m-d')) }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat / Desa</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Upload Akta Kelahiran</label><input type="file" name="file_akte" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                        @if(isset($isian['file_akte'])) <br><a href="{{ asset('storage/'.$isian['file_akte']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upload KK</label><input type="file" name="file_kk" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                        @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upload KTP Orang Tua</label><input type="file" name="file_ktp_ortu" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                        @if(isset($isian['file_ktp_ortu'])) <br><a href="{{ asset('storage/'.$isian['file_ktp_ortu']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upload Foto Anak</label><input type="file" name="file_foto" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                        @if(isset($isian['file_foto'])) <br><a href="{{ asset('storage/'.$isian['file_foto']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                </div>
                            @break

                            {{-- ============================== SPEK ============================== --}}
                            @case('SPEK')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nomor KK</label><input type="text" name="no_kk" class="form-control" value="{{ old('no_kk', $isian['no_kk'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Alamat Rumah</label><input type="text" name="alamat" class="form-control" value="{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Rincian Perubahan Elemen Data</h6>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Pilih Elemen Data yang Berubah</label>
                                        <select name="elemen_perubahan" class="form-control" required>
                                            <option value="">-- Pilih Elemen --</option>
                                            @foreach(['Pendidikan Terakhir', 'Pekerjaan', 'Agama', 'Status Perkawinan', 'Golongan Darah', 'Lainnya'] as $opt)
                                                <option value="{{ $opt }}" {{ old('elemen_perubahan', $isian['elemen_perubahan'] ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4"><label>Data Semula (Lama)</label><input type="text" name="data_semula" class="form-control" value="{{ old('data_semula', $isian['data_semula'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Data Menjadi (Baru)</label><input type="text" name="data_menjadi" class="form-control" value="{{ old('data_menjadi', $isian['data_menjadi'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Dasar Perubahan</label><input type="text" name="dasar_perubahan" class="form-control" value="{{ old('dasar_perubahan', $isian['dasar_perubahan'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Upload Kartu Keluarga (KK)</label><input type="file" name="file_kk" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file.</small>
                                        @if(isset($isian['file_kk'])) <br><a href="{{ asset('storage/'.$isian['file_kk']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Lama</a> @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upload KTP</label><input type="file" name="file_ktp" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file.</small>
                                        @if(isset($isian['file_ktp'])) <br><a href="{{ asset('storage/'.$isian['file_ktp']) }}" target="_blank" class="badge badge-info mt-1">Lihat File Lama</a> @endif
                                    </div>
                                </div>
                            @break

                            {{-- ============================== SPN ============================== --}}
                            @case('SPN')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Diri Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $isian['tempat_lahir'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $isian['tanggal_lahir'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? $penduduk->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan', $isian['kewarganegaraan'] ?? 'Indonesia') }}" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? $penduduk->religion) }}" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? $penduduk->pekerjaan) }}" required></div>
                                    <div class="form-group col-md-6">
                                        <label>Status Perkawinan</label>
                                        <select name="status_perkawinan" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach (['Jejaka', 'Perawan', 'Duda', 'Janda'] as $option)
                                                <option value="{{ $option }}" {{ old('status_perkawinan', $isian['status_perkawinan'] ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12"><label>Alamat Lengkap</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Ayah Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ayah</label><input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $isian['nama_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Bin</label><input type="text" name="bin_ayah" class="form-control" value="{{ old('bin_ayah', $isian['bin_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_ayah" class="form-control" value="{{ old('nik_ayah', $isian['nik_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir_ayah" class="form-control" value="{{ old('tempat_lahir_ayah', $isian['tempat_lahir_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir_ayah" class="form-control" value="{{ old('tanggal_lahir_ayah', $isian['tanggal_lahir_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_ayah" class="form-control" value="{{ old('kewarganegaraan_ayah', $isian['kewarganegaraan_ayah'] ?? 'Indonesia') }}" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama_ayah" class="form-control" value="{{ old('agama_ayah', $isian['agama_ayah'] ?? 'Islam') }}" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah', $isian['pekerjaan_ayah'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><textarea name="alamat_ayah" class="form-control" required>{{ old('alamat_ayah', $isian['alamat_ayah'] ?? '') }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Data Ibu Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $isian['nama_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Binti</label><input type="text" name="binti_ibu" class="form-control" value="{{ old('binti_ibu', $isian['binti_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_ibu" class="form-control" value="{{ old('nik_ibu', $isian['nik_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir_ibu" class="form-control" value="{{ old('tempat_lahir_ibu', $isian['tempat_lahir_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir_ibu" class="form-control" value="{{ old('tanggal_lahir_ibu', $isian['tanggal_lahir_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_ibu" class="form-control" value="{{ old('kewarganegaraan_ibu', $isian['kewarganegaraan_ibu'] ?? 'Indonesia') }}" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama_ibu" class="form-control" value="{{ old('agama_ibu', $isian['agama_ibu'] ?? 'Islam') }}" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu', $isian['pekerjaan_ibu'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><textarea name="alamat_ibu" class="form-control" required>{{ old('alamat_ibu', $isian['alamat_ibu'] ?? '') }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">D. Data Pasangan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Pasangan</label><input type="text" name="nama_pasangan" class="form-control" value="{{ old('nama_pasangan', $isian['nama_pasangan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Bin/Binti</label><input type="text" name="bin_binti_pasangan" class="form-control" value="{{ old('bin_binti_pasangan', $isian['bin_binti_pasangan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_pasangan" class="form-control" value="{{ old('nik_pasangan', $isian['nik_pasangan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text" name="tempat_lahir_pasangan" class="form-control" value="{{ old('tempat_lahir_pasangan', $isian['tempat_lahir_pasangan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_pasangan" class="form-control" value="{{ old('kewarganegaraan_pasangan', $isian['kewarganegaraan_pasangan'] ?? 'Indonesia') }}" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama_pasangan" class="form-control" value="{{ old('agama_pasangan', $isian['agama_pasangan'] ?? 'Islam') }}" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text" name="pekerjaan_pasangan" class="form-control" value="{{ old('pekerjaan_pasangan', $isian['pekerjaan_pasangan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><textarea name="alamat_pasangan" class="form-control" required>{{ old('alamat_pasangan', $isian['alamat_pasangan'] ?? '') }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">E. Data Saksi 1</h6>
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Nama Saksi 1</label><input type="text" name="nama_saksi_1" class="form-control" value="{{ old('nama_saksi_1', $isian['nama_saksi_1'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Umur (Tahun)</label><input type="number" name="umur_saksi_1" class="form-control" value="{{ old('umur_saksi_1', $isian['umur_saksi_1'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Pekerjaan</label><input type="text" name="pekerjaan_saksi_1" class="form-control" value="{{ old('pekerjaan_saksi_1', $isian['pekerjaan_saksi_1'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><input type="text" name="alamat_saksi_1" class="form-control" value="{{ old('alamat_saksi_1', $isian['alamat_saksi_1'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">F. Data Saksi 2</h6>
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Nama Saksi 2</label><input type="text" name="nama_saksi_2" class="form-control" value="{{ old('nama_saksi_2', $isian['nama_saksi_2'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Umur (Tahun)</label><input type="number" name="umur_saksi_2" class="form-control" value="{{ old('umur_saksi_2', $isian['umur_saksi_2'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Pekerjaan</label><input type="text" name="pekerjaan_saksi_2" class="form-control" value="{{ old('pekerjaan_saksi_2', $isian['pekerjaan_saksi_2'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><input type="text" name="alamat_saksi_2" class="form-control" value="{{ old('alamat_saksi_2', $isian['alamat_saksi_2'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    @foreach(['ktp_pemohon' => 'KTP Pemohon', 'ktp_pasangan' => 'KTP Pasangan', 'ktp_ortu' => 'KTP Orang Tua', 'surat_pengantar_rt' => 'Surat Pengantar RT', 'file_kk' => 'Kartu Keluarga (KK)'] as $key => $label)
                                        <div class="form-group col-md-6">
                                            <label>Upload {{ $label }}</label><input type="file" name="{{ $key }}" class="form-control">
                                            <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                            @if(isset($isian[$key])) <br><a href="{{ asset('storage/'.$isian[$key]) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                        </div>
                                    @endforeach
                                </div>
                            @break

                            {{-- ============================== SPKK ============================== --}}
                            @case('SPKK')
                                <h6 class="text-primary mt-3">Data Pemohon (Kepala Keluarga)</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? $penduduk->name) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $isian['nik'] ?? $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Tempat, Tanggal Lahir</label><input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{ old('tempat_tanggal_lahir', $isian['tempat_tanggal_lahir'] ?? '') }}" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Alamat Lengkap</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                
                                <div class="form-group"><label>Alasan Pembuatan KK</label>
                                    <select name="alasan_pembuatan" class="form-control" required>
                                        <option value="">-- Pilih Alasan --</option>
                                        @foreach(['Membentuk Keluarga Baru', 'Kartu Keluarga Hilang/Rusak', 'Penambahan/Pengurangan Anggota Keluarga', 'Pindah Datang'] as $opt)
                                            <option value="{{ $opt }}" {{ old('alasan_pembuatan', $isian['alasan_pembuatan'] ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                @foreach(['surat_pindah' => 'Surat Pindah', 'ktp_asli' => 'KTP Asli', 'file_kk' => 'KK Lama', 'file_buku_nikah' => 'Buku Nikah'] as $key => $label)
                                    <div class="form-group">
                                        <label>Upload {{ $label }}</label><input type="file" name="{{ $key }}" class="form-control">
                                        <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                        @if(isset($isian[$key])) <br><a href="{{ asset('storage/'.$isian[$key]) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                    </div>
                                @endforeach
                            @break

                            {{-- ============================== SPAK ============================== --}}
                            @case('SPAK')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Pelapor</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Pelapor</label><input type="text" name="nama_pelapor" class="form-control" value="{{ old('nama_pelapor', $isian['nama_pelapor'] ?? $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK Pelapor</label><input type="text" name="nik_pelapor" class="form-control" value="{{ old('nik_pelapor', $isian['nik_pelapor'] ?? $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nomor KK</label><input type="text" name="no_kk_pelapor" class="form-control" value="{{ old('no_kk_pelapor', $isian['no_kk_pelapor'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_pelapor" class="form-control" value="{{ old('kewarganegaraan_pelapor', $isian['kewarganegaraan_pelapor'] ?? 'Indonesia') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? $penduduk->alamat) }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Saksi Kelahiran</h6>
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <label class="font-weight-bold text-muted mb-2">SAKSI I</label>
                                        <div class="form-group"><label>Nama</label><input type="text" name="nama_saksi_1" class="form-control" value="{{ old('nama_saksi_1', $isian['nama_saksi_1'] ?? '') }}" required></div>
                                        <div class="form-group"><label>NIK</label><input type="text" name="nik_saksi_1" class="form-control" value="{{ old('nik_saksi_1', $isian['nik_saksi_1'] ?? '') }}" required></div>
                                        <div class="form-group"><label>No KK</label><input type="text" name="no_kk_saksi_1" class="form-control" value="{{ old('no_kk_saksi_1', $isian['no_kk_saksi_1'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_saksi_1" class="form-control" value="{{ old('kewarganegaraan_saksi_1', $isian['kewarganegaraan_saksi_1'] ?? 'Indonesia') }}" required></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold text-muted mb-2">SAKSI II</label>
                                        <div class="form-group"><label>Nama</label><input type="text" name="nama_saksi_2" class="form-control" value="{{ old('nama_saksi_2', $isian['nama_saksi_2'] ?? '') }}" required></div>
                                        <div class="form-group"><label>NIK</label><input type="text" name="nik_saksi_2" class="form-control" value="{{ old('nik_saksi_2', $isian['nik_saksi_2'] ?? '') }}" required></div>
                                        <div class="form-group"><label>No KK</label><input type="text" name="no_kk_saksi_2" class="form-control" value="{{ old('no_kk_saksi_2', $isian['no_kk_saksi_2'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_saksi_2" class="form-control" value="{{ old('kewarganegaraan_saksi_2', $isian['kewarganegaraan_saksi_2'] ?? 'Indonesia') }}" required></div>
                                    </div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Data Orang Tua Bayi</h6>
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <label class="font-weight-bold text-muted mb-2">DATA AYAH</label>
                                        <div class="form-group"><label>Nama</label><input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $isian['nama_ayah'] ?? '') }}" required></div>
                                        <div class="form-group"><label>NIK</label><input type="text" name="nik_ayah" class="form-control" value="{{ old('nik_ayah', $isian['nik_ayah'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir_ayah" class="form-control" value="{{ old('tempat_lahir_ayah', $isian['tempat_lahir_ayah'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir_ayah" class="form-control" value="{{ old('tanggal_lahir_ayah', $isian['tanggal_lahir_ayah'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_ayah" class="form-control" value="{{ old('kewarganegaraan_ayah', $isian['kewarganegaraan_ayah'] ?? 'Indonesia') }}" required></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold text-muted mb-2">DATA IBU</label>
                                        <div class="form-group"><label>Nama</label><input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $isian['nama_ibu'] ?? '') }}" required></div>
                                        <div class="form-group"><label>NIK</label><input type="text" name="nik_ibu" class="form-control" value="{{ old('nik_ibu', $isian['nik_ibu'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir_ibu" class="form-control" value="{{ old('tempat_lahir_ibu', $isian['tempat_lahir_ibu'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir_ibu" class="form-control" value="{{ old('tanggal_lahir_ibu', $isian['tanggal_lahir_ibu'] ?? '') }}" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan_ibu" class="form-control" value="{{ old('kewarganegaraan_ibu', $isian['kewarganegaraan_ibu'] ?? 'Indonesia') }}" required></div>
                                    </div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">D. Data Anak (Bayi)</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Anak</label><input type="text" name="nama_anak" class="form-control" value="{{ old('nama_anak', $isian['nama_anak'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin_anak" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin_anak', $isian['jenis_kelamin_anak'] ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin_anak', $isian['jenis_kelamin_anak'] ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Tempat Dilahirkan</label>
                                        <select name="tempat_dilahirkan" class="form-control" required>
                                            @foreach(['RS/RB', 'Puskesmas', 'Polindes', 'Rumah', 'Lainnya'] as $opt)
                                                <option value="{{ $opt }}" {{ old('tempat_dilahirkan', $isian['tempat_dilahirkan'] ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Tempat Kelahiran</label><input type="text" name="tempat_lahir_anak" class="form-control" value="{{ old('tempat_lahir_anak', $isian['tempat_lahir_anak'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tgl Lahir</label><input type="date" name="tanggal_lahir_anak" class="form-control" value="{{ old('tanggal_lahir_anak', $isian['tanggal_lahir_anak'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Pukul</label><input type="time" name="pukul_lahir" class="form-control" value="{{ old('pukul_lahir', $isian['pukul_lahir'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelahiran</label>
                                        <select name="jenis_kelahiran" class="form-control" required>
                                            @foreach(['Tunggal', 'Kembar 2', 'Kembar 3', 'Lainnya'] as $opt)
                                                <option value="{{ $opt }}" {{ old('jenis_kelahiran', $isian['jenis_kelahiran'] ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kelahiran Ke-</label><input type="number" name="kelahiran_ke" class="form-control" value="{{ old('kelahiran_ke', $isian['kelahiran_ke'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Penolong Kelahiran</label><input type="text" name="penolong_kelahiran" class="form-control" value="{{ old('penolong_kelahiran', $isian['penolong_kelahiran'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Berat Bayi (Kg)</label><input type="number" step="0.01" name="berat_bayi" class="form-control" value="{{ old('berat_bayi', $isian['berat_bayi'] ?? '') }}" required></div>
                                    <div class="form-group col-md-4"><label>Panjang Bayi (Cm)</label><input type="number" name="panjang_bayi" class="form-control" value="{{ old('panjang_bayi', $isian['panjang_bayi'] ?? '') }}" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    @foreach(['file_kk' => 'Kartu Keluarga', 'bukti_lahir' => 'Bukti Kelahiran', 'surat_nikah' => 'Surat Nikah', 'file_ktp_ortu' => 'KTP Ortu', 'ktp_saksi' => 'KTP Saksi'] as $key => $label)
                                        <div class="form-group col-md-6">
                                            <label>Upload {{ $label }}</label><input type="file" name="{{ $key }}" class="form-control">
                                            <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                            @if(isset($isian[$key])) <br><a href="{{ asset('storage/'.$isian[$key]) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                        </div>
                                    @endforeach
                                </div>
                            @break

                            {{-- ============================== SPKM ============================== --}}
                            @case('SPKM')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Almarhum / Almarhumah</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $isian['nama_lengkap'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $isian['jenis_kelamin'] ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan', $isian['kewarganegaraan'] ?? 'WNI') }}" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama" class="form-control" value="{{ old('agama', $isian['agama'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Dilahirkan</label><input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $isian['tanggal_lahir'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Kematian</label><input type="date" name="tanggal_kematian" class="form-control" value="{{ old('tanggal_kematian', $isian['tanggal_kematian'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Umur Saat Meninggal (Tahun)</label><input type="number" name="umur" class="form-control" value="{{ old('umur', $isian['umur'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Status Perkawinan</label>
                                        <select name="status_perkawinan" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach(['Belum Kawin', 'Kawin', 'Janda/Duda'] as $opt)
                                                <option value="{{ $opt }}" {{ old('status_perkawinan', $isian['status_perkawinan'] ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $isian['pekerjaan'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Kematian</label><input type="text" name="tempat_kematian" class="form-control" value="{{ old('tempat_kematian', $isian['tempat_kematian'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>Sebab Kematian</label><input type="text" name="sebab_kematian" class="form-control" value="{{ old('sebab_kematian', $isian['sebab_kematian'] ?? '') }}" required></div>
                                    <div class="form-group col-md-6"><label>No. KK / KTP</label><input type="text" name="no_kk_ktp" class="form-control" value="{{ old('no_kk_ktp', $isian['no_kk_ktp'] ?? '') }}" required></div>
                                    <div class="form-group col-md-12"><label>Alamat Lengkap</label><textarea name="alamat" class="form-control" required>{{ old('alamat', $isian['alamat'] ?? '') }}</textarea></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Lampiran Persyaratan</h6>
                                <div class="row">
                                    @foreach(['ktp_meninggal' => 'KTP Orang Meninggal', 'ktp_saksi_1' => 'KTP Saksi 1', 'ktp_saksi_2' => 'KTP Saksi 2'] as $key => $label)
                                        <div class="form-group col-md-12">
                                            <label>Upload {{ $label }}</label><input type="file" name="{{ $key }}" class="form-control">
                                            <small class="text-danger">*Biarkan kosong jika tidak mengubah file lama.</small>
                                            @if(isset($isian[$key])) <br><a href="{{ asset('storage/'.$isian[$key]) }}" target="_blank" class="badge badge-info mt-1">Lihat File Saat Ini</a> @endif
                                        </div>
                                    @endforeach
                                </div>
                            @break

                        @endswitch

                        <div class="card-footer mt-4 text-right">
                            <a href="{{ route('penduduk.riwayat.surat') }}" class="btn btn-light mr-2">Batal</a>
                            <button type="submit" class="btn btn-warning">Kirim Ulang Pengajuan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection