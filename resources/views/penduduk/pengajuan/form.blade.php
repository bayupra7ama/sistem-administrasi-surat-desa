@extends('layouts.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengajuan {{ $jenisSurat->nama_surat }}</h1>
            </div>
            <div class="card">
                <span class="text-warning">Jika ada data yang kosong / belum sesuai, lengkapi di <a class="text-warning"
                        href="{{ route('penduduk.profil') }}">profil</a></span>
                <div class="card-body">
                    <form action="{{ route('pengajuan.submit', $jenisSurat->kode) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @csrf

                        {{-- Hapus <div class="form-group"> Nama Lengkap yang lama di sini, kita masukkan ke dalam switch agar rapi --}}

                        {{-- Field Berdasarkan Jenis Surat --}}
                        @switch($jenisSurat->kode)
                            @case('SKD')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                                        class="form-control" value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik" class="form-control"
                                        value="{{ old('nik', $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Tempat Lahir</label><input type="text" name="tempat_lahir"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Jenis Kelamin</label><input type="text" name="jenis_kelamin"
                                        class="form-control" value="{{ old('jenis_kelamin', $penduduk->gender) }}" required></div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara"
                                        class="form-control" value="Indonesia" required></div>

                                {{-- Tambahan Form --}}
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan"
                                        class="form-control" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama"
                                        class="form-control" value="{{ old('agama', $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat (Sertakan RT/RW & Dusun)</label>
                                    <textarea name="alamat" class="form-control" placeholder="Contoh: RT 004 / RW 002 Dusun Putri Tujuh Desa Buruk Bakul"
                                        required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>
                                <div class="form-group"><label>Tujuan Pembuatan Surat</label><input type="text"
                                        name="tujuan_surat" class="form-control" placeholder="Contoh: Mendapatkan Beasiswa"
                                        required></div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Surat Pengantar RT</label><input type="file"
                                        name="surat_pengantar_rt" class="form-control" required></div>
                            @break

                            {{-- SD: Surat Dispensasi --}}
                            @case('SD')
                                <h6 class="text-primary mt-3">Data Diri & Kegiatan</h6>
                                <div class="form-group">
                                    <label>Nama Lengkap / Peserta</label>
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{ old('nama_lengkap', $penduduk->name) }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Tujuan Surat</label>
                                    <input type="text" name="tujuan_surat" class="form-control"
                                        placeholder="Contoh: KEPALA SDN 017 BUKIT BATU" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control"
                                        placeholder="Contoh: MTQ ke-XXXV Tingkat Kecamatan Bukit Batu" required>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Kegiatan</label>
                                    <input type="text" name="tempat_kegiatan" class="form-control"
                                        placeholder="Contoh: Desa Sungai Selari" required>
                                </div>

                                {{-- <div class="form-group">
                                    <label>Keterangan Tambahan Peserta (Opsional)</label>
                                    <input type="text" name="keterangan_pemohon" class="form-control"
                                        placeholder="Contoh: yang berada di kelas VI">
                                </div> --}}

                                <div class="form-group">
                                    <label>Waktu Pelaksanaan</label>
                                    <input type="text" name="waktu_kegiatan" class="form-control"
                                        placeholder="Contoh: mulai dari tanggal 25 s/d 31 Juli 2024" required>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group">
                                    <label>Upload KK</label>
                                    <input type="file" name="file_kk" class="form-control" required>
                                </div>
                            @break

                            {{-- SKTM: Surat Keterangan Tidak Mampu --}}
                            @case('SKTM')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                                        class="form-control" value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Tempat, Tanggal Lahir</label><input type="text"
                                        name="tempat_tanggal_lahir" class="form-control"
                                        placeholder="Contoh: Jakarta, 17 Agustus 1990" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik"
                                        class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin', $penduduk->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin', $penduduk->gender) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara"
                                        class="form-control" value="WNI" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan"
                                        class="form-control" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama"
                                        class="form-control" value="{{ old('agama', $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat</label>
                                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>
                                <div class="form-group"><label>Tujuan / Keperluan Surat</label>
                                    <input type="text" name="tujuan_surat" class="form-control"
                                        placeholder="Contoh: Pendaftaran Sekolah Menengah Pertama (SMP) Tahun Ajaran 2025/2026"
                                        required>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Surat Pengantar RT</label><input type="file"
                                        name="surat_pengantar_rt" class="form-control" required></div>
                            @break

                            {{-- SPIK: Surat Pengantar Izin Keramaian --}}
                            {{-- SPIK: Surat Pengantar Izin Keramaian --}}
                            @case('SPIK')
                                <h6 class="text-primary mt-3">Data Diri (Tuan Rumah)</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                                        class="form-control" value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Umur (Tahun)</label><input type="number" name="umur"
                                        class="form-control" placeholder="Contoh: 61" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama"
                                        class="form-control" value="{{ old('agama', $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik"
                                        class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control"
                                        placeholder="Contoh: Jalan Lintas Sungai Pakning – Dumai, RT 004 / RW 002" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>

                                <h6 class="text-primary mt-4">Detail Keramaian</h6>
                                <div class="form-group">
                                    <label>Jenis Acara </label>
                                    <input type="text" name="jenis_acara" class="form-control"
                                        placeholder="Contoh: resepsi pernikahan" required>
                                </div>
                                <div class="form-group">
                                    <label>Detail Acara & Waktu </label>
                                    <input type="text" name="detail_acara" class="form-control"
                                        placeholder="Contoh: pesta pernikahan anaknya pada hari Sabtu tanggal 15 November 2025"
                                        required>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Surat Pengantar RT</label><input type="file"
                                        name="surat_pengantar_rt" class="form-control" required></div>
                            @break

                            {{-- SKU: Surat Keterangan Usaha --}}
                            @case('SKU')
                                <h6 class="text-primary mt-3">Data Diri</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                                        class="form-control" value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                <div class="form-group"><label>Tempat / Tanggal Lahir</label><input type="text"
                                        name="tempat_tanggal_lahir" class="form-control" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik"
                                        class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Jenis Kelamin</label><input type="text" name="jenis_kelamin"
                                        class="form-control" value="{{ old('jenis_kelamin', $penduduk->gender) }}" required>
                                </div>
                                <div class="form-group"><label>Warga Negara</label><input type="text" name="warga_negara"
                                        class="form-control" value="WNI" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan"
                                        class="form-control" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Agama</label><input type="text" name="agama"
                                        class="form-control" value="{{ old('agama', $penduduk->religion) }}" required></div>
                                <div class="form-group"><label>Alamat</label>
                                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>

                                <h6 class="text-primary mt-4">Data Usaha</h6>
                                <div class="form-group"><label>Nama Usaha</label><input type="text" name="nama_usaha"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Alamat Usaha</label>
                                    <textarea name="alamat_usaha" class="form-control" required></textarea>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Surat Pengantar RT</label><input type="file"
                                        name="surat_pengantar_rt" class="form-control" required></div>
                            @break

                            {{-- SISANYA BIARKAN SEPERTI LAMA --}}
                            @case('SPP')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload Buku Nikah</label><input type="file"
                                        name="file_buku_nikah" class="form-control" required></div>
                            @break

                            @case('SKIA')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>KTP Orang Tua</label><input type="file" name="file_ktp_ortu"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Akte Lahir Anak</label><input type="file" name="file_akte"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Kartu Keluarga</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Foto Anak</label><input type="file" name="file_foto"
                                        class="form-control" required></div>
                            @break

                            @case('SPEK')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP</label><input type="file" name="file_ktp"
                                        class="form-control" required></div>
                            @break

                            {{-- SPN: Surat Pengantar Nikah --}}
                            @case('SPN')
                                {{-- A. DATA PEMOHON --}}
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Diri Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text"
                                            name="nama_lengkap" class="form-control"
                                            value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik"
                                            class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text"
                                            name="tempat_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date"
                                            name="tanggal_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin', $penduduk->gender) == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin', $penduduk->gender) == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan" class="form-control" value="Indonesia" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama"
                                            class="form-control" value="{{ old('agama', $penduduk->religion) }}" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan" class="form-control"
                                            value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required></div>
                                    @php
                                        $statusOptions = ['Jejaka', 'Perawan', 'Duda', 'Janda'];
                                    @endphp

                                    <div class="form-group col-md-6">
                                        <label>Status Perkawinan</label>
                                        <select name="status_perkawinan" class="form-control" required>
                                            <option value="">-- Pilih Status Perkawinan --</option>
                                            @foreach ($statusOptions as $option)
                                                <option value="{{ $option }}"
                                                    {{ old('status_perkawinan', $penduduk->status_perkawinan ?? '') == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    </div>
                                </div>

                                {{-- B. DATA AYAH --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Ayah Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ayah</label><input type="text"
                                            name="nama_ayah" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Bin</label><input type="text" name="bin_ayah"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_ayah"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text"
                                            name="tempat_lahir_ayah" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date"
                                            name="tanggal_lahir_ayah" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan_ayah" class="form-control" value="Indonesia" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama_ayah"
                                            class="form-control" value="Islam" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan_ayah" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label>
                                        <textarea name="alamat_ayah" class="form-control" required></textarea>
                                    </div>
                                </div>

                                {{-- C. DATA IBU --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Data Ibu Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Binti</label><input type="text" name="binti_ibu"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_ibu"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text"
                                            name="tempat_lahir_ibu" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date"
                                            name="tanggal_lahir_ibu" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan_ibu" class="form-control" value="Indonesia" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama_ibu"
                                            class="form-control" value="Islam" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan_ibu" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label>
                                        <textarea name="alamat_ibu" class="form-control" required></textarea>
                                    </div>
                                </div>

                                {{-- D. DATA PASANGAN --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">D. Data Pasangan Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Pasangan</label><input type="text"
                                            name="nama_pasangan" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Bin/Binti</label><input type="text"
                                            name="bin_binti_pasangan" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik_pasangan"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text"
                                            name="tempat_lahir_pasangan" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan_pasangan" class="form-control" value="Indonesia" required>
                                    </div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text"
                                            name="agama_pasangan" class="form-control" value="Islam" required></div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan_pasangan" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label>
                                        <textarea name="alamat_pasangan" class="form-control" required></textarea>
                                    </div>
                                </div>

                                {{-- E & F. DATA SAKSI --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">E. Data Saksi Pertama (Tidak Terikat Pernikahan
                                    Lain)</h6>
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Nama Saksi Pertama</label><input type="text"
                                            name="nama_saksi_1" class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Umur (Tahun)</label><input type="number"
                                            name="umur_saksi_1" class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan_saksi_1" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><input type="text"
                                            name="alamat_saksi_1" class="form-control" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">F. Data Saksi Kedua (Tidak Terikat Pernikahan
                                    Lain)</h6>
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Nama Saksi Kedua</label><input type="text"
                                            name="nama_saksi_2" class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Umur (Tahun)</label><input type="number"
                                            name="umur_saksi_2" class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan_saksi_2" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat</label><input type="text"
                                            name="alamat_saksi_2" class="form-control" required></div>
                                </div>

                                {{-- LAMPIRAN --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>KTP Pemohon</label><input type="file"
                                            name="ktp_pemohon" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>KTP Pasangan</label><input type="file"
                                            name="ktp_pasangan" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>KTP Kedua Orang Tua</label><input type="file"
                                            name="ktp_ortu" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Surat Pengantar RT</label><input type="file"
                                            name="surat_pengantar_rt" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Kartu Keluarga (KK)</label><input type="file"
                                            name="file_kk" class="form-control" required></div>
                                </div>
                            @break

                            @case('SPKK')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>Upload Surat Pindah</label><input type="file"
                                        name="surat_pindah" class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP Asli</label><input type="file" name="ktp_asli"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload Buku Nikah</label><input type="file"
                                        name="file_buku_nikah" class="form-control" required></div>
                            @break

                            @case('SPAK')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP Orang Tua</label><input type="file"
                                        name="file_ktp_ortu" class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP Saksi</label><input type="file" name="ktp_saksi"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload Surat Nikah</label><input type="file" name="surat_nikah"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload Bukti Lahir</label><input type="file" name="bukti_lahir"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload Materai</label><input type="file" name="materai"
                                        class="form-control" required></div>
                            @break

                            @case('SPKM')
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" class="form-control"
                                        value="{{ $penduduk->name }}" readonly></div>
                                <div class="form-group"><label>KTP yang Meninggal</label><input type="file"
                                        name="ktp_meninggal" class="form-control" required></div>
                                <div class="form-group"><label>Upload KK</label><input type="file" name="file_kk"
                                        class="form-control" required></div>
                                <div class="form-group"><label>KTP Saksi</label><input type="file" name="ktp_saksi"
                                        class="form-control" required></div>
                            @break
                        @endswitch




                        <div class="card-footer">
                            <button class="btn btn-primary">Kirim Pengajuan</button>
                            <a href="{{ route('dashboard.penduduk') }}" class="btn btn-light ml-3">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
