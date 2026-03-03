@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pengajuan: {{ $pengajuan->jenisSurat->nama_surat }}</h1>
            </div>

            <div class="card">
                <div class="card-body">

                    {{-- ================== ISIAN TEKS FORMULIR ================== --}}
                    <h6 class="text-primary mb-3">Data Isian Pengajuan</h6>

                    @if (!empty($pengajuan->data))
                        @php
                            $kode = $pengajuan->jenisSurat->kode;
                            // Memastikan JSON ter-decode dengan benar menjadi array
                            $isian = is_string($pengajuan->data)
                                ? json_decode($pengajuan->data, true)
                                : (array) $pengajuan->data;
                        @endphp

                        {{-- ================== KHUSUS SPAK (AKTA KELAHIRAN) ================== --}}
                        @if ($kode == 'SPAK')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">A. Data Pelapor</h6>
                            <div class="row mb-3">
                                <div class="col-md-3"><label class="text-muted text-uppercase" style="font-size: 11px;">Nama
                                        Pelapor</label>
                                    <div class="font-weight-bold">{{ $isian['nama_pelapor'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">NIK</label>
                                    <div class="font-weight-bold">{{ $isian['nik_pelapor'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nomor KK</label>
                                    <div class="font-weight-bold">{{ $isian['no_kk_pelapor'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Warga Negara</label>
                                    <div class="font-weight-bold">{{ $isian['kewarganegaraan_pelapor'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-12 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat</label>
                                    <div class="font-weight-bold">{{ $isian['alamat'] ?? '-' }}</div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">B. Data Orang Tua Bayi</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 border-right">
                                    <div class="text-info font-weight-bold mb-2">DATA AYAH</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_ayah'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_ayah'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Tempat, Tgl Lahir</label>
                                        <div class="font-weight-bold">{{ $isian['tempat_lahir_ayah'] ?? '-' }},
                                            {{ $isian['tanggal_lahir_ayah'] ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-info font-weight-bold mb-2">DATA IBU</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_ibu'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_ibu'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Tempat, Tgl Lahir</label>
                                        <div class="font-weight-bold">{{ $isian['tempat_lahir_ibu'] ?? '-' }},
                                            {{ $isian['tanggal_lahir_ibu'] ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">C. Data Anak (Bayi)</h6>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Anak</label>
                                    <div class="font-weight-bold">{{ $isian['nama_anak'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Jenis Kelamin</label>
                                    <div class="font-weight-bold">{{ $isian['jenis_kelamin_anak'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tempat Dilahirkan</label>
                                    <div class="font-weight-bold">{{ $isian['tempat_dilahirkan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tempat, Tgl Lahir</label>
                                    <div class="font-weight-bold">{{ $isian['tempat_lahir_anak'] ?? '-' }},
                                        {{ $isian['tanggal_lahir_anak'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Pukul (Waktu)</label>
                                    <div class="font-weight-bold">{{ $isian['pukul_lahir'] ?? '-' }} WIB</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Jenis Kelahiran</label>
                                    <div class="font-weight-bold">{{ $isian['jenis_kelahiran'] ?? '-' }} (Anak
                                        ke-{{ $isian['kelahiran_ke'] ?? '-' }})</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Penolong Kelahiran</label>
                                    <div class="font-weight-bold">{{ $isian['penolong_kelahiran'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-2 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Berat</label>
                                    <div class="font-weight-bold">{{ $isian['berat_bayi'] ?? '-' }} Kg</div>
                                </div>
                                <div class="col-md-2 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Panjang</label>
                                    <div class="font-weight-bold">{{ $isian['panjang_bayi'] ?? '-' }} Cm</div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">D. Data Saksi Kelahiran</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 border-right">
                                    <div class="text-info font-weight-bold mb-2">SAKSI I</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_saksi_1'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_saksi_1'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">No KK</label>
                                        <div class="font-weight-bold">{{ $isian['no_kk_saksi_1'] ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-info font-weight-bold mb-2">SAKSI II</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_saksi_2'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_saksi_2'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">No KK</label>
                                        <div class="font-weight-bold">{{ $isian['no_kk_saksi_2'] ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>

                            {{-- ================== KHUSUS SPN (PENGANTAR NIKAH) ================== --}}
                        @elseif ($kode == 'SPN')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">A. Data Pemohon & Pasangan</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 border-right">
                                    <div class="text-info font-weight-bold mb-2">PEMOHON</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama Lengkap</label>
                                        <div class="font-weight-bold">{{ $isian['nama_lengkap'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Status</label>
                                        <div class="font-weight-bold">{{ $isian['status_perkawinan'] ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-info font-weight-bold mb-2">CALON PASANGAN</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama Lengkap</label>
                                        <div class="font-weight-bold">{{ $isian['nama_pasangan'] ?? '-' }}
                                            ({{ $isian['bin_binti_pasangan'] ?? '-' }})</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_pasangan'] ?? '-' }}</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Tempat Lahir</label>
                                        <div class="font-weight-bold">{{ $isian['tempat_lahir_pasangan'] ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">B. Data Orang Tua Pemohon</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 border-right">
                                    <div class="text-info font-weight-bold mb-2">DATA AYAH</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_ayah'] ?? '-' }}
                                            ({{ $isian['bin_ayah'] ?? '-' }})</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_ayah'] ?? '-' }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-info font-weight-bold mb-2">DATA IBU</div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">Nama</label>
                                        <div class="font-weight-bold">{{ $isian['nama_ibu'] ?? '-' }}
                                            ({{ $isian['binti_ibu'] ?? '-' }})</div>
                                    </div>
                                    <div class="mb-2"><label class="text-muted text-uppercase"
                                            style="font-size: 11px;">NIK</label>
                                        <div class="font-weight-bold">{{ $isian['nik_ibu'] ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>

                            {{-- ================== KHUSUS SPKM (AKTA KEMATIAN) ================== --}}
                        @elseif ($kode == 'SPKM')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">Data Almarhum / Almarhumah</h6>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Lengkap</label>
                                    <div class="font-weight-bold">{{ $isian['nama_lengkap'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Jenis Kelamin</label>
                                    <div class="font-weight-bold">{{ $isian['jenis_kelamin'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Agama</label>
                                    <div class="font-weight-bold">{{ $isian['agama'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tgl Lahir</label>
                                    <div class="font-weight-bold">{{ $isian['tanggal_lahir'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tgl Kematian</label>
                                    <div class="font-weight-bold">{{ $isian['tanggal_kematian'] ?? '-' }} (Umur:
                                        {{ $isian['umur'] ?? '-' }} Thn)</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Kewarganegaraan</label>
                                    <div class="font-weight-bold">{{ $isian['kewarganegaraan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Status</label>
                                    <div class="font-weight-bold">{{ $isian['status_perkawinan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Pekerjaan</label>
                                    <div class="font-weight-bold">{{ $isian['pekerjaan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Sebab Kematian</label>
                                    <div class="font-weight-bold">{{ $isian['sebab_kematian'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-6 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tempat Kematian</label>
                                    <div class="font-weight-bold">{{ $isian['tempat_kematian'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-6 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">No KK / KTP</label>
                                    <div class="font-weight-bold">{{ $isian['no_kk_ktp'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-12 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat</label>
                                    <div class="font-weight-bold">{{ $isian['alamat'] ?? '-' }}</div>
                                </div>
                            </div>

                            {{-- ================== KHUSUS SPP (PERPINDAHAN PENDUDUK) ================== --}}
                        @elseif ($kode == 'SPP')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">Data Perpindahan Penduduk</h6>
                            <div class="row mb-3">
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Lengkap</label>
                                    <div class="font-weight-bold">{{ $isian['nama_lengkap'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">NIK</label>
                                    <div class="font-weight-bold">{{ $isian['nik'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nomor KK</label>
                                    <div class="font-weight-bold">{{ $isian['no_kk'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Kepala Keluarga</label>
                                    <div class="font-weight-bold">{{ $isian['nama_kepala_keluarga'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-6 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat Sekarang</label>
                                    <div class="font-weight-bold">{{ $isian['alamat_sekarang'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-6 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat Tujuan</label>
                                    <div class="font-weight-bold text-primary">{{ $isian['alamat_tujuan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Jumlah Pindah</label>
                                    <div class="font-weight-bold">{{ $isian['jumlah_pindah'] ?? '-' }} Orang</div>
                                </div>
                            </div>

                            {{-- ================== KHUSUS SKIA (PEMBUATAN KIA) ================== --}}
                        @elseif ($kode == 'SKIA')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">A. Data Anak</h6>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Anak</label>
                                    <div class="font-weight-bold">{{ $isian['nama_anak'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">NIK Anak</label>
                                    <div class="font-weight-bold">{{ $isian['nik_anak'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">No. KK</label>
                                    <div class="font-weight-bold">{{ $isian['no_kk'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">No. Akta Kelahiran</label>
                                    <div class="font-weight-bold">{{ $isian['no_akta'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-8 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tempat, Tgl Lahir</label>
                                    <div class="font-weight-bold">{{ $isian['tempat_lahir'] ?? '-' }},
                                        {{ $isian['tanggal_lahir'] ?? '-' }}</div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">B. Data Orang Tua & Pemohon</h6>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Ayah</label>
                                    <div class="font-weight-bold">{{ $isian['nama_ayah'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Ibu</label>
                                    <div class="font-weight-bold">{{ $isian['nama_ibu'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Pemohon</label>
                                    <div class="font-weight-bold">{{ $isian['nama_pemohon'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-4 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Tgl Permohonan</label>
                                    <div class="font-weight-bold">{{ $isian['tanggal_permohonan'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-8 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat / Desa</label>
                                    <div class="font-weight-bold">{{ $isian['alamat'] ?? '-' }}</div>
                                </div>
                            </div>

                            {{-- ================== KHUSUS SPEK (PERUBAHAN ELEMEN KEPENDUDUKAN) ================== --}}
                        @elseif ($kode == 'SPEK')
                            <h6 class="font-weight-bold text-dark mt-3 border-bottom pb-2">A. Data Pemohon</h6>
                            <div class="row mb-3">
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nama Lengkap</label>
                                    <div class="font-weight-bold">{{ $isian['nama_lengkap'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">NIK</label>
                                    <div class="font-weight-bold">{{ $isian['nik'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-3 mb-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Nomor KK</label>
                                    <div class="font-weight-bold">{{ $isian['no_kk'] ?? '-' }}</div>
                                </div>
                                <div class="col-md-12 mb-2 mt-2"><label class="text-muted text-uppercase"
                                        style="font-size: 11px;">Alamat Rumah</label>
                                    <div class="font-weight-bold">{{ $isian['alamat'] ?? '-' }}</div>
                                </div>
                            </div>

                            <h6 class="font-weight-bold text-dark mt-4 border-bottom pb-2">B. Rincian Perubahan</h6>
                            <div class="row mb-3">
                                @if (isset($isian['elemen_perubahan']))
                                    <div class="col-md-3 mb-2">
                                        <label class="text-muted text-uppercase" style="font-size: 11px;">Elemen
                                            Data</label>
                                        <div class="font-weight-bold text-primary">{{ $isian['elemen_perubahan'] ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="text-muted text-uppercase" style="font-size: 11px;">Data
                                            Semula</label>
                                        <div class="font-weight-bold text-danger">{{ $isian['data_semula'] ?? '-' }}</div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="text-muted text-uppercase" style="font-size: 11px;">Data
                                            Menjadi</label>
                                        <div class="font-weight-bold text-success">{{ $isian['data_menjadi'] ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="text-muted text-uppercase" style="font-size: 11px;">Dasar
                                            Perubahan</label>
                                        <div class="font-weight-bold">{{ $isian['dasar_perubahan'] ?? '-' }}</div>
                                    </div>
                                @elseif (isset($isian['keterangan_berubah']))
                                    <div class="col-md-12 mb-2 mt-2">
                                        <label class="text-muted text-uppercase" style="font-size: 11px;">Keterangan
                                            Perubahan</label>
                                        <div class="font-weight-bold text-danger border p-2 bg-light rounded">
                                            {{ $isian['keterangan_berubah'] ?? '-' }}
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12 text-muted">Belum ada rincian perubahan yang diinput.</div>
                                @endif
                            </div>

                            {{-- ================== DEFAULT: UNTUK SURAT LAINNYA ================== --}}
                        @else
                            <div class="row mb-4">
                                @foreach ($isian as $key => $value)
                                    @if (is_string($value) && !Str::startsWith($value, 'syarat/'))
                                        @php
                                            // Jika isiannya panjang, buat 1 baris full. Jika pendek, bagi 3 kolom.
                                            $colSize =
                                                Str::contains($key, 'alamat') ||
                                                Str::contains($key, 'keterangan') ||
                                                Str::contains($key, 'usaha')
                                                    ? 'col-md-12'
                                                    : 'col-md-4';
                                        @endphp
                                        <div class="form-group {{ $colSize }} mb-3">
                                            <label class="text-muted text-uppercase"
                                                style="font-size: 11px; font-weight: bold; letter-spacing: 0.5px;">
                                                {{ ucwords(str_replace('_', ' ', $key)) }}
                                            </label>
                                            <div class="form-control-plaintext border-bottom"
                                                style="height: auto; padding-left: 0; padding-bottom: 5px;">
                                                <strong class="text-dark">{{ $value }}</strong>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @else
                        <div class="alert alert-light text-center text-muted">Tidak ada data isian spesifik.</div>
                    @endif

                    <hr>

                    {{-- ================== BERKAS UPLOAD ================== --}}
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
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
                                    @foreach ($isian as $key => $path)
                                        @if (is_string($path) && Str::startsWith($path, 'syarat/'))
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ ucwords(str_replace(['file_', '_'], ['', ' '], $key)) }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $path) }}" target="_blank"
                                                        class="btn btn-sm btn-primary">
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
                    @if ($pengajuan->status == 'Menunggu' || $pengajuan->status == 'pending')
                        <h6 class="text-primary mb-3">Tindakan Admin</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card border-success border">
                                    <div class="card-body">
                                        <h5 class="text-success">Setujui Pengajuan</h5>
                                        <form action="{{ route('pengajuan.approve', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Pesan Persetujuan (Opsional)</label>
                                                <textarea name="pesan_admin" class="form-control" rows="2" placeholder="Cth: Surat sedang diproses..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block"
                                                onclick="return confirm('Yakin ingin MENYETUJUI pengajuan ini?')">Setujui
                                                Pengajuan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="card border-danger border">
                                    <div class="card-body">
                                        <h5 class="text-danger">Tolak Pengajuan</h5>
                                        <form action="{{ route('pengajuan.reject', $pengajuan->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Alasan Penolakan <span class="text-danger">*</span></label>
                                                <textarea name="pesan_admin" class="form-control" rows="2" required
                                                    placeholder="Cth: Dokumen tidak jelas, mohon perbaiki..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block"
                                                onclick="return confirm('Yakin ingin MENOLAK pengajuan ini?')">Tolak
                                                Pengajuan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info d-flex justify-content-between align-items-center mt-4">
                            <div>
                                Pengajuan ini sudah berstatus: <strong>{{ strtoupper($pengajuan->status) }}</strong>.<br>
                                Catatan Admin: {{ $pengajuan->pesan_admin ?? 'Tidak ada pesan' }}
                            </div>

                            @if ($pengajuan->status == 'Approved')
                                <a href="{{ route('pengajuan.print', $pengajuan->id) }}" target="_blank"
                                    class="btn btn-primary btn-lg">
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
