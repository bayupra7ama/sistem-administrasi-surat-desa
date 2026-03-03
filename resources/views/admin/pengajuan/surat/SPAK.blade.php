@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div style="text-align: right; margin-bottom: 20px;">
        Buruk Bakul, {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}
    </div>

    <table style="width: 100%; margin-bottom: 20px;">
        <tr>
            
            <td style="width: 40%; vertical-align: top;">
                Kepada Yth.,<br>
                <strong>Kepala UPT Disdukcapil Kec. Bukit Batu</strong><br>
                Di -<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sungai Pakning
            </td>
        </tr>
    </table>

    <div class="judul-surat">SURAT PENGANTAR PEMBUATAN AKTA KELAHIRAN</div>
    <div class="nomor-surat">Nomor : {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf indent">Yang bertanda tangan di bawah ini Penjabat Kepala Desa Buruk Bakul Kecamatan Bukit Batu Kabupaten Bengkalis, dengan ini menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 30%;">Nama Anak</td>
            <td style="width: 2%;">:</td>
            <td><strong>{{ strtoupper($data['nama_anak'] ?? '-') }}</strong></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $data['jenis_kelamin_anak'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>{{ $data['tempat_lahir_anak'] ?? '-' }}, {{ \Carbon\Carbon::parse($data['tanggal_lahir_anak'] ?? now())->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <p class="paragraf indent">Anak tersebut adalah benar anak kandung dari perkawinan yang sah antara suami istri :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 30%;">Nama Ayah</td>
            <td style="width: 2%;">:</td>
            <td>{{ strtoupper($data['nama_ayah'] ?? '-') }}</td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>:</td>
            <td>{{ strtoupper($data['nama_ibu'] ?? '-') }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="paragraf indent">Surat pengantar ini dibuat sebagai kelengkapan administrasi untuk <strong>Pembuatan Akta Kelahiran</strong>. Bersama surat ini turut dilampirkan berkas persyaratan yang telah disiapkan oleh pemohon.</p>

    <p class="paragraf indent">Demikian Surat Pengantar ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

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