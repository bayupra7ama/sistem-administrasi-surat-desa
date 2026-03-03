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
                <strong>KAPOLSEK BUKIT BATU</strong><br>
                Di -<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sungai Pakning
            </td>
        </tr>
    </table>

    <div class="judul-surat">SURAT PERMOHONAN IZIN KERAMAIAN</div>
    <div class="nomor-surat">Nomor : {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf indent">Menindaklanjuti Surat Permohonan Izin Keramaian dari Panitia Pelaksana {{ $data['jenis_acara'] ?? 'resepsi pernikahan' }} ( terlampir ), Penjabat Kepala Desa Buruk Bakul Kecamatan Bukit Batu Kabupaten Bengkalis dengan ini menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 20%;">Nama</td>
            <td style="width: 2%;">:</td>
            <td>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td>{{ $data['umur'] ?? '-' }} Tahun</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $data['agama'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="paragraf indent">Bersama ini kami akan mengajukan Permohonan Izin Keramaian acara {{ $data['detail_acara'] ?? '-' }} yang bertempat di alamat tersebut diatas kepada Polsek Bukit Batu.</p>
    
    <p class="paragraf indent">Pada dasarnya, kami dari Pemerintah Desa Buruk Bakul akan memberikan rekomendasi sesuai dengan izin yang diberikan oleh Kapolsek Bukit Batu terhadap permohonannya, serta seluruh keamanan dipertanggungjawabkan oleh Tuan Rumah dan Panitia Pelaksana Acara yang dimaksud.</p>

    <p class="paragraf indent">Demikian Surat Pengantar Izin Keramaian ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>

    <table class="ttd-table">
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