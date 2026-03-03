@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div style="text-align: right; margin-bottom: 20px;">
        Buruk Bakul, {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}
    </div>

    <table style="width: 100%; margin-bottom: 20px;">
        <tr>
            {{-- <td style="width: 60%;"></td> --}}
            <td style="width: 40%; vertical-align: top;">
                Kepada Yth.,<br>
                <strong>Kepala UPT Disdukcapil Kec. Bukit Batu</strong><br>
                Di -<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sungai Pakning
            </td>
        </tr>
    </table>

    <div class="judul-surat">SURAT PENGANTAR PEMBUATAN KARTU KELUARGA</div>
    <div class="nomor-surat">Nomor : {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf indent">Yang bertanda tangan di bawah ini Penjabat Kepala Desa Buruk Bakul Kecamatan Bukit Batu
        Kabupaten Bengkalis, dengan ini menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 30%;">Nama Lengkap</td>
            <td style="width: 2%;">:</td>
            <td><strong>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</strong></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>{{ $data['tempat_tanggal_lahir'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $data['pekerjaan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="paragraf indent">Orang tersebut di atas adalah benar warga yang berdomisili di Desa Buruk Bakul. Surat
        pengantar ini dibuat sebagai kelengkapan administrasi untuk <strong>Pembuatan Kartu Keluarga (KK) Baru</strong>
        dengan alasan: <strong>{{ $data['alasan_pembuatan'] ?? '-' }}</strong>.</p>

    <p class="paragraf indent">Sebagai kelengkapan administrasi, bersama surat ini turut dilampirkan berkas persyaratan dan
        Formulir Biodata Keluarga (F-1.01) yang telah diisi oleh pemohon.</p>

    <p class="paragraf indent">Demikian Surat Pengantar ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana
        mestinya.</p>

    <table class="ttd-table" style="margin-top: 40px;">
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
