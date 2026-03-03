@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div class="judul-surat">SURAT KETERANGAN TIDAK MAMPU</div>
    <div class="nomor-surat">NOMOR: {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf indent">Penjabat Kepala Desa Buruk Bakul Kecamatan Bukit Batu Kabupaten Bengkalis dengan ini
        menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 35%;">Nama</td>
            <td style="width: 2%;">:</td>
            <td>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data['tempat_tanggal_lahir'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data['nik'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $data['jenis_kelamin'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Warga Negara</td>
            <td>:</td>
            <td>{{ $data['warga_negara'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $data['pekerjaan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $data['agama'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $data['alamat'] ?? '-' }}</td>
        </tr>
    </table>

    <p class="paragraf indent">Benar nama tersebut diatas adalah penduduk Desa Buruk Bakul Kecamatan Bukit Batu Kabupaten
        Bengkalis, dan sepanjang pengetahuan kami yang tersebut namanya di atas adalah <strong>Keluarga Kurang
            Mampu</strong>.</p>

    <p class="paragraf indent">Surat Keterangan Tidak Mampu ini dipergunakan sebagai persyaratan
        {{ $data['tujuan_surat'] ?? 'pendaftaran/kebutuhan lainnya' }}.</p>

    <p class="paragraf indent">Demikian Surat Keterangan Tidak Mampu ini dibuat dengan sebenarnya untuk dapat dipergunakan
        sebagaimana mestinya.</p>

    <table class="ttd-table">
        <tr>
            <td></td>
            <td>
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
