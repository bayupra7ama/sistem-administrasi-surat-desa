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
                            {{-- SPP: Surat Pengantar Perpindahan Penduduk --}}
                            @case('SPP')
                                <h6 class="text-primary mt-3 border-bottom pb-2">Data Diri & Kepindahan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik"
                                            class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text"
                                            name="nama_lengkap" class="form-control"
                                            value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nomor Kartu Keluarga (KK)</label><input type="text"
                                            name="no_kk" class="form-control" value="{{ old('no_kk', $penduduk->kk) }}"
                                            required></div>
                                    <div class="form-group col-md-6"><label>Nama Kepala Keluarga</label><input type="text"
                                            name="nama_kepala_keluarga" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat Sekarang</label>
                                        <textarea name="alamat_sekarang" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12"><label>Alamat Tujuan Pindah</label>
                                        <textarea name="alamat_tujuan" class="form-control"
                                            placeholder="Contoh: Jl. Sudirman RT 01 RW 02, Desa Maju, Kec. Jaya, Kab. Siak" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6"><label>Jumlah Keluarga yang Pindah</label><input
                                            type="number" name="jumlah_pindah" class="form-control" placeholder="Contoh: 3"
                                            required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-4"><label>Upload KK</label><input type="file" name="file_kk"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Upload KTP</label><input type="file"
                                            name="file_ktp" class="form-control" required></div>
                                    <div class="form-group col-md-4"><label>Upload Buku Nikah</label><input type="file"
                                            name="file_buku_nikah" class="form-control" required></div>
                                </div>
                            @break

                            {{-- SKIA: Surat Pengantar Pembuatan KIA --}}
                            @case('SKIA')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Anak</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Anak</label><input type="text"
                                            name="nama_anak" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>NIK Anak</label><input type="text" name="nik_anak"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>No. KK</label><input type="text" name="no_kk"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>No. Akta Kelahiran</label><input type="text"
                                            name="no_akta" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tempat Lahir</label><input type="text"
                                            name="tempat_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Lahir</label><input type="date"
                                            name="tanggal_lahir" class="form-control" required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Orang Tua & Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Ayah</label><input type="text"
                                            name="nama_ayah" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Nama Ibu</label><input type="text" name="nama_ibu"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Nama Pemohon</label><input type="text"
                                            name="nama_pemohon" class="form-control"
                                            value="{{ old('nama_pemohon', $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Permohonan</label><input type="date"
                                            name="tanggal_permohonan" class="form-control" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group col-md-12"><label>Alamat / Desa</label>
                                        <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    </div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Upload Akta Kelahiran</label><input type="file"
                                            name="file_akte" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload Kartu Keluarga (KK)</label><input
                                            type="file" name="file_kk" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload KTP Kedua Orang Tua</label><input
                                            type="file" name="file_ktp_ortu" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload Pas Foto Anak 2x3</label><input type="file"
                                            name="file_foto" class="form-control" required></div>
                                </div>
                            @break

                            {{-- SPEK: Surat Pernyataan Perubahan Elemen Kependudukan --}}
                            @case('SPEK')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Pemohon</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text"
                                            name="nama_lengkap" class="form-control"
                                            value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK</label><input type="text" name="nik"
                                            class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                    <div class="form-group col-md-6"><label>Nomor KK</label><input type="text" name="no_kk"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Alamat Rumah</label><input type="text"
                                            name="alamat" class="form-control" value="{{ old('alamat', $penduduk->alamat) }}"
                                            required></div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Rincian Perubahan Elemen Data</h6>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Pilih Elemen Data yang Berubah</label>
                                        <select name="elemen_perubahan" class="form-control" required>
                                            <option value="">-- Pilih Elemen --</option>
                                            <option value="Pendidikan Terakhir">Pendidikan Terakhir</option>
                                            <option value="Pekerjaan">Pekerjaan</option>
                                            <option value="Agama">Agama</option>
                                            <option value="Status Perkawinan">Status Perkawinan</option>
                                            <option value="Golongan Darah">Golongan Darah</option>
                                            <option value="Lainnya">Lainnya...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Data Semula (Lama)</label>
                                        <input type="text" name="data_semula" class="form-control"
                                            placeholder="Contoh: Belum Kawin" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Data Menjadi (Baru)</label>
                                        <input type="text" name="data_menjadi" class="form-control"
                                            placeholder="Contoh: Kawin" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Dasar Perubahan</label>
                                        <input type="text" name="dasar_perubahan" class="form-control"
                                            placeholder="Contoh: Buku Nikah" required>
                                    </div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Upload Kartu Keluarga (KK)</label><input
                                            type="file" name="file_kk" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload KTP</label><input type="file"
                                            name="file_ktp" class="form-control" required></div>
                                </div>
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

                            {{-- SPKK: Surat Pengantar Pembuatan KK --}}
                            @case('SPKK')
                                <h6 class="text-primary mt-3">Data Pemohon (Kepala Keluarga)</h6>
                                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                                        class="form-control" value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                <div class="form-group"><label>NIK</label><input type="text" name="nik"
                                        class="form-control" value="{{ old('nik', $penduduk->nik) }}" required></div>
                                <div class="form-group"><label>Tempat, Tanggal Lahir</label><input type="text"
                                        name="tempat_tanggal_lahir" class="form-control"
                                        placeholder="Contoh: Buruk Bakul, 17 Agustus 1990" required></div>
                                <div class="form-group"><label>Pekerjaan</label><input type="text" name="pekerjaan"
                                        class="form-control" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required></div>
                                <div class="form-group"><label>Alamat Lengkap</label>
                                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                </div>

                                <div class="form-group"><label>Alasan Pembuatan KK</label>
                                    <select name="alasan_pembuatan" class="form-control" required>
                                        <option value="">-- Pilih Alasan --</option>
                                        <option value="Membentuk Keluarga Baru">Membentuk Keluarga Baru (Menikah)</option>
                                        <option value="Kartu Keluarga Hilang/Rusak">Kartu Keluarga Hilang / Rusak</option>
                                        <option value="Penambahan/Pengurangan Anggota Keluarga">Penambahan / Pengurangan Anggota
                                            Keluarga</option>
                                        <option value="Pindah Datang">Pindah Datang</option>
                                    </select>
                                </div>

                                <h6 class="text-primary mt-4">Lampiran Persyaratan</h6>
                                <div class="form-group"><label>Upload Surat Pindah (Jika Ada)</label><input type="file"
                                        name="surat_pindah" class="form-control" required></div>
                                <div class="form-group"><label>Upload KTP Asli</label><input type="file" name="ktp_asli"
                                        class="form-control" required></div>
                                <div class="form-group"><label>Upload KK Lama / KK Orang Tua</label><input type="file"
                                        name="file_kk" class="form-control" required></div>
                                <div class="form-group"><label>Upload Buku Nikah</label><input type="file"
                                        name="file_buku_nikah" class="form-control" required></div>
                            @break

                            {{-- SPAK: Surat Pengantar Pembuatan Akta Kelahiran --}}
                            @case('SPAK')
                                {{-- 1. DATA PELAPOR --}}
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Pelapor</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Pelapor</label><input type="text"
                                            name="nama_pelapor" class="form-control"
                                            value="{{ old('nama_lengkap', $penduduk->name) }}" required></div>
                                    <div class="form-group col-md-6"><label>NIK Pelapor</label><input type="text"
                                            name="nik_pelapor" class="form-control" value="{{ old('nik', $penduduk->nik) }}"
                                            required></div>
                                    <div class="form-group col-md-6"><label>Nomor KK</label><input type="text"
                                            name="no_kk_pelapor" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan_pelapor" class="form-control" value="Indonesia" required></div>
                                    <div class="form-group col-md-12"><label>Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    </div>
                                </div>

                                {{-- 2. DATA SAKSI --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Data Saksi Kelahiran</h6>
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <label class="font-weight-bold text-muted mb-2">SAKSI I</label>
                                        <div class="form-group"><label>Nama Saksi I</label><input type="text"
                                                name="nama_saksi_1" class="form-control" required></div>
                                        <div class="form-group"><label>NIK Saksi I</label><input type="text"
                                                name="nik_saksi_1" class="form-control" required></div>
                                        <div class="form-group"><label>Nomor KK Saksi I</label><input type="text"
                                                name="no_kk_saksi_1" class="form-control" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text"
                                                name="kewarganegaraan_saksi_1" class="form-control" value="Indonesia" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold text-muted mb-2">SAKSI II</label>
                                        <div class="form-group"><label>Nama Saksi II</label><input type="text"
                                                name="nama_saksi_2" class="form-control" required></div>
                                        <div class="form-group"><label>NIK Saksi II</label><input type="text"
                                                name="nik_saksi_2" class="form-control" required></div>
                                        <div class="form-group"><label>Nomor KK Saksi II</label><input type="text"
                                                name="no_kk_saksi_2" class="form-control" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text"
                                                name="kewarganegaraan_saksi_2" class="form-control" value="Indonesia" required>
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. DATA ORANG TUA --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">C. Data Orang Tua Bayi</h6>
                                <div class="row">
                                    <div class="col-md-6 border-right">
                                        <label class="font-weight-bold text-muted mb-2">DATA AYAH</label>
                                        <div class="form-group"><label>Nama Ayah</label><input type="text" name="nama_ayah"
                                                class="form-control" required></div>
                                        <div class="form-group"><label>NIK Ayah</label><input type="text" name="nik_ayah"
                                                class="form-control" required></div>
                                        <div class="form-group"><label>Tempat Lahir</label><input type="text"
                                                name="tempat_lahir_ayah" class="form-control" required></div>
                                        <div class="form-group"><label>Tanggal Lahir</label><input type="date"
                                                name="tanggal_lahir_ayah" class="form-control" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text"
                                                name="kewarganegaraan_ayah" class="form-control" value="Indonesia" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold text-muted mb-2">DATA IBU</label>
                                        <div class="form-group"><label>Nama Ibu</label><input type="text" name="nama_ibu"
                                                class="form-control" required></div>
                                        <div class="form-group"><label>NIK Ibu</label><input type="text" name="nik_ibu"
                                                class="form-control" required></div>
                                        <div class="form-group"><label>Tempat Lahir</label><input type="text"
                                                name="tempat_lahir_ibu" class="form-control" required></div>
                                        <div class="form-group"><label>Tanggal Lahir</label><input type="date"
                                                name="tanggal_lahir_ibu" class="form-control" required></div>
                                        <div class="form-group"><label>Kewarganegaraan</label><input type="text"
                                                name="kewarganegaraan_ibu" class="form-control" value="Indonesia" required></div>
                                    </div>
                                </div>

                                {{-- 4. DATA ANAK --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">D. Data Anak (Bayi)</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Anak</label><input type="text"
                                            name="nama_anak" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin_anak" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Tempat Dilahirkan</label>
                                        <select name="tempat_dilahirkan" class="form-control" required>
                                            <option value="RS/RB">RS/RB</option>
                                            <option value="Puskesmas">Puskesmas</option>
                                            <option value="Polindes">Polindes</option>
                                            <option value="Rumah">Rumah</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Tempat Kelahiran (Nama Kota/Desa)</label><input
                                            type="text" name="tempat_lahir_anak" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Hari dan Tanggal Lahir</label><input type="date"
                                            name="tanggal_lahir_anak" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Pukul (Waktu Lahir)</label><input type="time"
                                            name="pukul_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelahiran</label>
                                        <select name="jenis_kelahiran" class="form-control" required>
                                            <option value="Tunggal">Tunggal</option>
                                            <option value="Kembar 2">Kembar 2</option>
                                            <option value="Kembar 3">Kembar 3</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kelahiran Ke-</label><input type="number"
                                            name="kelahiran_ke" class="form-control" placeholder="Contoh: 1 / 2 / 3" required>
                                    </div>
                                    <div class="form-group col-md-4"><label>Penolong Kelahiran</label><input type="text"
                                            name="penolong_kelahiran" class="form-control"
                                            placeholder="Contoh: Bidan / Dokter / Dukun" required></div>
                                    <div class="form-group col-md-4"><label>Berat Bayi (Kg)</label><input type="number"
                                            step="0.01" name="berat_bayi" class="form-control" placeholder="Contoh: 3.5"
                                            required></div>
                                    <div class="form-group col-md-4"><label>Panjang Bayi (Cm)</label><input type="number"
                                            name="panjang_bayi" class="form-control" placeholder="Contoh: 50" required></div>
                                </div>

                                {{-- 5. LAMPIRAN --}}
                                <h6 class="text-primary mt-4 border-bottom pb-2">Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Kartu Keluarga (KK)</label><input type="file"
                                            name="file_kk" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Surat Asli Bukti Kelahiran</label><input
                                            type="file" name="bukti_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Surat Nikah Orang Tua</label><input type="file"
                                            name="surat_nikah" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>KTP Kedua Orang Tua</label><input type="file"
                                            name="file_ktp_ortu" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>KTP 2 Orang Saksi Kelahiran</label><input
                                            type="file" name="ktp_saksi" class="form-control" required></div>
                                </div>
                            @break

                            {{-- SPKM: Surat Pengantar Pembuatan Akta Kematian --}}
                            @case('SPKM')
                                <h6 class="text-primary mt-3 border-bottom pb-2">A. Data Almarhum / Almarhumah</h6>
                                <div class="row">
                                    <div class="form-group col-md-6"><label>Nama Lengkap</label><input type="text"
                                            name="nama_lengkap" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Kewarganegaraan</label><input type="text"
                                            name="kewarganegaraan" class="form-control" value="WNI" required></div>
                                    <div class="form-group col-md-6"><label>Agama</label><input type="text" name="agama"
                                            class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Dilahirkan</label><input type="date"
                                            name="tanggal_lahir" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Tanggal Kematian</label><input type="date"
                                            name="tanggal_kematian" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Umur Saat Meninggal (Tahun)</label><input
                                            type="number" name="umur" class="form-control" placeholder="Contoh: 86"
                                            required></div>
                                    <div class="form-group col-md-6"><label>Status Perkawinan</label>
                                        <select name="status_perkawinan" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Janda/Duda">Janda/Duda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6"><label>Pekerjaan</label><input type="text"
                                            name="pekerjaan" class="form-control" placeholder="Contoh: Petani / Pekebun"
                                            required></div>
                                    <div class="form-group col-md-6"><label>Tempat Kematian</label><input type="text"
                                            name="tempat_kematian" class="form-control"
                                            placeholder="Contoh: Rumah Sakit / Rumah Desa Buruk Bakul" required></div>
                                    <div class="form-group col-md-6"><label>Sebab Kematian</label><input type="text"
                                            name="sebab_kematian" class="form-control" placeholder="Contoh: Sakit (Dokter)"
                                            required></div>
                                    <div class="form-group col-md-6"><label>No. KK / KTP</label><input type="text"
                                            name="no_kk_ktp" class="form-control" required></div>
                                    <div class="form-group col-md-12"><label>Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control" placeholder="Contoh: RT 004 / RW 002 Desa Buruk Bakul" required></textarea>
                                    </div>
                                </div>

                                <h6 class="text-primary mt-4 border-bottom pb-2">B. Lampiran Persyaratan</h6>
                                <div class="row">
                                    <div class="form-group col-md-12"><label>Upload KTP Orang yang Meninggal</label><input
                                            type="file" name="ktp_meninggal" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload KTP Saksi 1</label><input type="file"
                                            name="ktp_saksi_1" class="form-control" required></div>
                                    <div class="form-group col-md-6"><label>Upload KTP Saksi 2</label><input type="file"
                                            name="ktp_saksi_2" class="form-control" required></div>
                                </div>
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
