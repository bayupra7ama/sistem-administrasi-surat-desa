<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir SPEK - {{ $data['nama_lengkap'] ?? 'Pemohon' }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 0mm;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
            color: black;
            background: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        .cetak-area {
            width: 21cm;
            min-height: 29.7cm;
            margin: 1cm auto;
            padding: 2cm 2.5cm;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            position: relative;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .header-left {
            font-weight: bold;
            font-size: 12pt;
            line-height: 1.3;
        }

        .header-right {
            font-weight: bold;
            font-size: 12pt;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 30px;
            text-decoration: underline;
        }

        .tabel-data {
            width: 100%;
            border-collapse: collapse;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .tabel-data td {
            padding: 4px 0;
            vertical-align: top;
        }

        .tabel-data td:nth-child(1) {
            width: 25%;
        }

        .tabel-data td:nth-child(2) {
            width: 2%;
            text-align: center;
        }

        .paragraf {
            text-align: justify;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        /* CSS Untuk Tabel Perubahan */
        .tabel-perubahan {
            width: 95%;
            border-collapse: collapse;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .tabel-perubahan th,
        .tabel-perubahan td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .tabel-perubahan th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
        }

        .ttd-table td {
            width: 50%;
            vertical-align: top;
            text-align: right;
            padding-right: 20px;
        }

        .ttd-nama {
            font-weight: bold;
            margin-top: 80px;
            text-align: right;
            padding-right: 10px;
        }

        .materai-box {
            display: inline-block;
            width: 80px;
            height: 50px;
            border: 1px solid black;
            font-size: 8pt;
            text-align: center;
            line-height: 50px;
            color: #555;
            margin-right: 60px;
            margin-top: 10px;
        }

        .btn-print {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 25px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-weight: bold;
        }

        .btn-print:hover {
            background: #0056b3;
        }

        @media print {
            body {
                background: white;
                margin: 1cm;
            }

            .cetak-area {
                margin: 0;
                padding: 0;
                box-shadow: none;
                width: 100%;
                min-height: auto;
            }

            .btn-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <button class="btn-print" onclick="window.print()">🖨️ Cetak Surat Pernyataan</button>

    <div class="cetak-area">
        <div class="header-container">
            <div class="header-left">
                PEMERINTAH KABUPATEN BENGKALIS<br>
                DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL
            </div>
            <div class="header-right">
                F 1. 06
            </div>
        </div>

        <div class="judul-surat">SURAT PERNYATAAN PERUBAHAN ELEMEN DATA KEPENDUDUKAN</div>

        <p class="paragraf">Yang bertanda tangan di bawah ini :</p>

        <table class="tabel-data">
            <tr>
                <td>Nama lengkap</td>
                <td>:</td>
                <td>{{ strtoupper($data['nama_lengkap'] ?? '-') }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $data['nik'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nomor KK</td>
                <td>:</td>
                <td>{{ $data['no_kk'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat rumah</td>
                <td>:</td>
                <td>{{ $data['alamat'] ?? '-' }}</td>
            </tr>
        </table>

        <p class="paragraf">Menyatakan bahwa elemen data kependudukan saya dan/atau anggota keluarga saya telah berubah,
            dengan rincian perubahan sebagai berikut :</p>

        {{-- TABEL RINCIAN PERUBAHAN --}}
        <table class="tabel-perubahan">
            <thead>
                <tr>
                    <th style="width: 30%;">Elemen Data</th>
                    <th style="width: 25%;">Semula</th>
                    <th style="width: 25%;">Menjadi</th>
                    <th style="width: 20%;">Dasar Perubahan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ strtoupper($data['elemen_perubahan'] ?? '-') }}</td>
                    <td>{{ strtoupper($data['data_semula'] ?? '-') }}</td>
                    <td>{{ strtoupper($data['data_menjadi'] ?? '-') }}</td>
                    <td>{{ strtoupper($data['dasar_perubahan'] ?? '-') }}</td>
                </tr>
            </tbody>
        </table>

        <p class="paragraf" style="font-style: italic;">
            Terlampir disampaikan fotocopy berkas-berkas yang terkait dengan perubahan elemen data tersebut.
        </p>

        <p class="paragraf">
            Demikian Surat Pernyataan ini saya buat dengan sebenarnya, apabila dalam keterangan yang saya berikan
            terdapat hal-hal yang tidak berdasarkan keadaan yang sebenarnya, saya bersedia dikenakan sanksi sesuai
            ketentuan peraturan perundang-undangan yang berlaku.
        </p>

        <table class="ttd-table">
            <tr>
                <td>
                    <p style="margin-bottom: 5px;">Buruk Bakul,
                        {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}</p>
                    <p style="margin-top: 0; margin-bottom: 0;">Yang membuat pernyataan,</p>
                    <div class="materai-box">Materai 10.000</div>
                    <div class="ttd-nama">
                        {{ strtoupper($data['nama_lengkap'] ?? '..................................') }}</div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
