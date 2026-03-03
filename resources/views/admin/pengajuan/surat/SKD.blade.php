@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div class="judul-surat">SURAT KETERANGAN DOMISILI</div>
    <div class="nomor-surat">NOMOR: {{ $pengajuan->nomor_surat }}</div>

    <p class="paragraf">Yang bertanda tangan di bawah ini :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 25%;">Nama</td>
            <td style="width: 2%;">:</td>
            <td><b>{{ strtoupper($profilDesa->nama_kepala_desa ?? 'HASANUDIN, SE') }}</b></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><b>PENJABAT KEPALA DESA BURUK BAKUL</b></td>
        </tr>
    </table>

    <p class="paragraf">Dengan ini menerangkan bahwa :</p>

    <table class="tabel-data">
        <tr>
            <td style="width: 35%;">Nama</td>
            <td style="width: 2%;">:</td>
            <td><b>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</b></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data['tempat_lahir'] ?? '-' }},
                {{ \Carbon\Carbon::parse($data['tanggal_lahir'] ?? now())->translatedFormat('d F Y') }}</td>
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

    <p class="paragraf indent">Benar nama tersebut diatas saat ini berdomisili di {{ $data['alamat'] ?? '-' }} Kecamatan
        Bukit Batu Kabupaten Bengkalis.

        Adapun Surat Keterangan Domisili ini dibuat untuk melengkapi persyaratan
        <b> {{ $data['tujuan_surat'] ?? '-' }}.</b>
    </p>

    <p class="paragraf indent">Demikian Surat Keterangan Domisili ini dibuat dengan sebenarnya untuk dapat dipergunakan
        seperlunya.</p>

    <table class="ttd-table">
        <tr>
            <td></td>
            <td>
                <p style="margin-bottom: 0;">Buruk Bakul,
                    {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}</p>
                <p style="margin-top: 0;"><b> KEPALA DESA BURUK BAKUL</b></p>
                <div class="ttd-nama">{{ strtoupper($profilDesa->nama_kepala_desa ?? 'HASANUDIN, SE') }}</div>
                <p style="margin:0;">PENATA</p>
                <p style="margin:0;">NIP. 19850120 201001 1 003</p>
            </td>
        </tr>
    </table>
@endsection
