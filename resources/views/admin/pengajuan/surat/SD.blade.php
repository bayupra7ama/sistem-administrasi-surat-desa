@extends('admin.pengajuan.surat.layout_print')

@section('content')
    <div style="text-align: right; margin-bottom: 20px; margin-top: 30px;">
        Buruk Bakul, {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}
    </div>

    <table style="width: 100%; margin-bottom: 20px; border: none;">
        <tr>
            <td style="width: 15%; vertical-align: top;">Nomor</td>
            <td style="width: 2%; vertical-align: top;">:</td>
            <td style="width: 83%; vertical-align: top;">{{ $pengajuan->nomor_surat }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Lampiran</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">-</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Perihal</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;"><u>Permohonan Dispensasi</u></td>
        </tr>
    </table>

    <div style="margin-bottom: 20px;">
        Kepada Yth :<br>
        Bapak/Ibu <strong>{{ strtoupper($data['tujuan_surat'] ?? '-') }}</strong><br>
        Di &ndash;<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat
    </div>

    <p class="paragraf indent">
        Dalam rangka pelaksanaan kegiatan {{ $data['nama_kegiatan'] ?? '-' }} yang akan dilaksanakan di {{ $data['tempat_kegiatan'] ?? '-' }}, dengan ini kami memohon kepada Bapak/Ibu untuk dapat memberikan izin/dispensasi untuk mengikuti acara tersebut kepada Saudara/i <strong>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</strong> pada tanggal {{ $data['waktu_kegiatan'] ?? '-' }}.
    </p>

    <p class="paragraf indent">Demikian Surat Permohonan Dispensasi ini kami sampaikan, atas kerjasamanya diucapkan terima kasih.</p>

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