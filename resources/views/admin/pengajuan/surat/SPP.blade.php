@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div class="judul-surat">SURAT PENGANTAR PERPINDAHAN PENDUDUK</div>
    <div class="nomor-surat">NOMOR: {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf indent">Yang bertanda tangan di bawah ini, menerangkan Pemohon Pindah Penduduk WNI dengan data sebagai
        berikut :</p>

    <table class="tabel-data">

        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td style="width: 35%;">Nama Lengkap</td>
            <td style="width: 2%;">:</td>
            <td>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</td>
        </tr>

        <tr>
            <td>Nomor Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $data['no_kk'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Nama Kepala Keluarga</td>
            <td>:</td>
            <td>{{ strtoupper($data['nama_kepala_keluarga'] ?? '-') }}</td>
        </tr>
        <tr>
            <td>Alamat Sekarang</td>
            <td>:</td>
            <td>{{ $data['alamat_sekarang'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat Tujuan Pindah</td>
            <td>:</td>
            <td>{{ $data['alamat_tujuan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jumlah Keluarga yang Pindah</td>
            <td>:</td>
            <td>{{ $data['jumlah_pindah'] ?? '-' }} Orang</td>
        </tr>
    </table>

    <p class="paragraf indent">Adapun Pemohon Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.</p>

    <p class="paragraf indent">Demikian Surat Pengantar ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana
        mestinya.</p>

    <table class="ttd-table" style="margin-top: 40px;">
        <tr>
            <td style="width: 50%;"></td>
            <td style="width: 50%;">
                <p style="margin-bottom: 0;">Buruk Bakul,
                    {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}</p>
                <p style="margin-top: 0;">Pj. KEPALA DESA BURUK BAKUL</p>
                <div class="ttd-nama">{{ strtoupper($profilDesa->nama_kepala_desa ?? 'HASANUDIN, SE') }}</div>
                <p style="margin:0;">PENATA</p>
                <p style="margin:0;">NIP. 19850120 201001 1 003</p>
            </td>
        </tr>
    </table>
@endsection
