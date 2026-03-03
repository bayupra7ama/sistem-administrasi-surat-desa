@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div style="text-align: center; font-weight: bold; font-size: 13pt; margin-bottom: 10px;">FORMULIR PENGANTAR NIKAH</div>
    
    <table style="width: 100%; margin-bottom: 15px; border: none;">
        <tr>
            <td style="width: 30%;">KANTOR DESA / KELURAHAN</td>
            <td style="width: 2%;">:</td>
            <td>BURUK BAKUL</td>
        </tr>
        <tr>
            <td>KECAMATAN</td>
            <td>:</td>
            <td>BUKIT BATU</td>
        </tr>
        <tr>
            <td>KABUPATEN / KOTA</td>
            <td>:</td>
            <td>BENGKALIS</td>
        </tr>
    </table>

    <div class="judul-surat" style="margin-top: 5px;">PENGANTAR NIKAH</div>
    <div class="nomor-surat" style="margin-bottom: 10px;">Nomor : {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf">Yang bertanda tangan di bawah ini, Kepala Desa Buruk Bakul menerangkan bahwa :</p>

    {{-- A. DATA PEMOHON --}}
    <div style="font-weight: bold; margin-bottom: 5px;">A. DATA DIRI PEMOHON</div>
    <table class="tabel-data" style="margin-bottom: 10px;">
        <tr><td style="width: 30%;">Nama lengkap</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</td></tr>
        <tr><td>NIK</td><td>:</td><td>{{ $data['nik'] ?? '-' }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $data['jenis_kelamin'] ?? '-' }}</td></tr>
        <tr><td>Tempat Lahir</td><td>:</td><td>{{ $data['tempat_lahir'] ?? '-' }}</td></tr>
        <tr><td>Tanggal Lahir</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['tanggal_lahir'] ?? now())->translatedFormat('d F Y') }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $data['kewarganegaraan'] ?? '-' }}</td></tr>
        <tr><td>Agama</td><td>:</td><td>{{ $data['agama'] ?? '-' }}</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan'] ?? '-' }}</td></tr>
        <tr><td>Status Perkawinan</td><td>:</td><td>{{ $data['status_perkawinan'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat'] ?? '-' }}</td></tr>
    </table>

    {{-- B. DATA AYAH --}}
    <div style="font-weight: bold; margin-bottom: 5px;">B. DATA AYAH PEMOHON</div>
    <table class="tabel-data" style="margin-bottom: 10px;">
        <tr><td style="width: 30%;">Nama Ayah</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_ayah'] ?? '-') }}</td></tr>
        <tr><td>Bin</td><td>:</td><td>{{ strtoupper($data['bin_ayah'] ?? '-') }}</td></tr>
        <tr><td>NIK</td><td>:</td><td>{{ $data['nik_ayah'] ?? '-' }}</td></tr>
        <tr><td>Tempat Lahir</td><td>:</td><td>{{ $data['tempat_lahir_ayah'] ?? '-' }}</td></tr>
        <tr><td>Tanggal Lahir</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['tanggal_lahir_ayah'] ?? now())->translatedFormat('d F Y') }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $data['kewarganegaraan_ayah'] ?? '-' }}</td></tr>
        <tr><td>Agama</td><td>:</td><td>{{ $data['agama_ayah'] ?? '-' }}</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan_ayah'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat_ayah'] ?? '-' }}</td></tr>
    </table>

    {{-- C. DATA IBU --}}
    <div style="font-weight: bold; margin-bottom: 5px;">C. DATA IBU PEMOHON</div>
    <table class="tabel-data" style="margin-bottom: 10px;">
        <tr><td style="width: 30%;">Nama Ibu</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_ibu'] ?? '-') }}</td></tr>
        <tr><td>Binti</td><td>:</td><td>{{ strtoupper($data['binti_ibu'] ?? '-') }}</td></tr>
        <tr><td>NIK</td><td>:</td><td>{{ $data['nik_ibu'] ?? '-' }}</td></tr>
        <tr><td>Tempat Lahir</td><td>:</td><td>{{ $data['tempat_lahir_ibu'] ?? '-' }}</td></tr>
        <tr><td>Tanggal Lahir</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['tanggal_lahir_ibu'] ?? now())->translatedFormat('d F Y') }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $data['kewarganegaraan_ibu'] ?? '-' }}</td></tr>
        <tr><td>Agama</td><td>:</td><td>{{ $data['agama_ibu'] ?? '-' }}</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan_ibu'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat_ibu'] ?? '-' }}</td></tr>
    </table>

    {{-- D. DATA PASANGAN --}}
    <div style="font-weight: bold; margin-bottom: 5px;">D. DATA PASANGAN PEMOHON</div>
    <table class="tabel-data" style="margin-bottom: 10px;">
        <tr><td style="width: 30%;">Nama Pasangan</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_pasangan'] ?? '-') }}</td></tr>
        <tr><td>Bin / Binti</td><td>:</td><td>{{ strtoupper($data['bin_binti_pasangan'] ?? '-') }}</td></tr>
        <tr><td>NIK</td><td>:</td><td>{{ $data['nik_pasangan'] ?? '-' }}</td></tr>
        <tr><td>Tempat Lahir</td><td>:</td><td>{{ $data['tempat_lahir_pasangan'] ?? '-' }}</td></tr>
        <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $data['kewarganegaraan_pasangan'] ?? '-' }}</td></tr>
        <tr><td>Agama</td><td>:</td><td>{{ $data['agama_pasangan'] ?? '-' }}</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan_pasangan'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat_pasangan'] ?? '-' }}</td></tr>
    </table>

    {{-- E. DATA SAKSI 1 --}}
    <div style="font-weight: bold; margin-bottom: 5px;">E. DATA SAKSI PERTAMA (tidak terikat pernikahan lain)</div>
    <table class="tabel-data" style="margin-bottom: 10px;">
        <tr><td style="width: 30%;">Nama Saksi</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_saksi_1'] ?? '-') }}</td></tr>
        <tr><td>Umur</td><td>:</td><td>{{ $data['umur_saksi_1'] ?? '-' }} Tahun</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan_saksi_1'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat_saksi_1'] ?? '-' }}</td></tr>
    </table>

    {{-- F. DATA SAKSI 2 --}}
    <div style="font-weight: bold; margin-bottom: 5px;">F. DATA SAKSI KEDUA (tidak terikat pernikahan lain)</div>
    <table class="tabel-data" style="margin-bottom: 15px;">
        <tr><td style="width: 30%;">Nama Saksi</td><td style="width: 2%;">:</td><td>{{ strtoupper($data['nama_saksi_2'] ?? '-') }}</td></tr>
        <tr><td>Umur</td><td>:</td><td>{{ $data['umur_saksi_2'] ?? '-' }} Tahun</td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td>{{ $data['pekerjaan_saksi_2'] ?? '-' }}</td></tr>
        <tr><td>Alamat</td><td>:</td><td>{{ $data['alamat_saksi_2'] ?? '-' }}</td></tr>
    </table>

    <p class="paragraf">Demikian surat pengantar nikah ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

    <table class="ttd-table" style="page-break-inside: avoid;">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;">
                <p style="margin-top: 0; margin-bottom: 0;">Pj. KEPALA DESA BURUK BAKUL</p>
                <div class="ttd-nama">{{ strtoupper($profilDesa->nama_kepala_desa ?? 'HASANUDIN, SE') }}</div>
                <p style="margin:0;">PENATA</p>
                <p style="margin:0;">NIP. 19850120 201001 1 003</p>
            </td>
        </tr>
    </table>
@endsection