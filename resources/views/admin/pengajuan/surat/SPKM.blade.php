<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kematian - {{ $data['nama_lengkap'] ?? 'Almarhum' }}</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 0mm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
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

        .header-kanan {
            text-align: right;
            text-decoration: underline;
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            font-size: 14pt;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .nomor-surat {
            text-align: center;
            margin-top: 0;
            margin-bottom: 40px;
            font-size: 12pt;
        }

        .tabel-data {
            width: 100%;
            border-collapse: collapse;
            margin-left: 10px;
        }

        .tabel-data td {
            padding: 6px 0;
            vertical-align: top;
        }

        .tabel-data td:nth-child(1) {
            width: 5%;
            text-align: left;
        }

        /* Nomor urut */
        .tabel-data td:nth-child(2) {
            width: 35%;
        }

        /* Label Teks */
        .tabel-data td:nth-child(3) {
            width: 2%;
            text-align: center;
        }

        /* Titik Dua */
        .tabel-data td:nth-child(4) {
            width: 58%;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Isian */

        .ttd-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px;
        }

        .ttd-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
        }

        .ttd-nama {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 80px;
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
    <button class="btn-print" onclick="window.print()">🖨️ Cetak Surat Kematian</button>

    <div class="cetak-area">
        {{-- KOP KANAN SESUAI GAMBAR --}}
        <div class="header-kanan">
            ARSIP UNTUK KECAMATAN
        </div>

        <div class="judul-surat">SURAT KEMATIAN</div>
        <div class="nomor-surat">No. {{ $pengajuan->nomor_surat }}</div>

        <table class="tabel-data">
            <tr>
                <td>1.</td>
                <td>Nama lengkap</td>
                <td>:</td>
                <td>{{ $data['nama_lengkap'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td>{{ $data['jenis_kelamin'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Alamat</td>
                <td>:</td>
                <td><span style="text-transform: none; font-weight: normal;">{{ $data['alamat'] ?? '-' }}</span></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Dilahirkan</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($data['tanggal_lahir'] ?? now())->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Tanggal kematian</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($data['tanggal_kematian'] ?? now())->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Umur pada saat kematian</td>
                <td>:</td>
                <td>{{ $data['umur'] ?? '-' }} TAHUN</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{ $data['kewarganegaraan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $data['agama'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Status perkawinan</td>
                <td>:</td>
                <td>{{ $data['status_perkawinan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>10.</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $data['pekerjaan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>11.</td>
                <td>Tempat kematian</td>
                <td>:</td>
                <td>{{ $data['tempat_kematian'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Sebab kematian</td>
                <td>:</td>
                <td>{{ $data['sebab_kematian'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>13.</td>
                <td>No. Kartu Keluarga / K.T.P.</td>
                <td>:</td>
                <td>{{ $data['no_kk_ktp'] ?? '-' }}</td>
            </tr>
        </table>

        <table class="ttd-table">
            <tr>
                <td></td>
                <td>
                    <p style="margin-bottom: 5px;">Buruk Bakul,
                        {{ \Carbon\Carbon::parse($pengajuan->updated_at)->translatedFormat('d F Y') }}</p>
                    <p style="margin-top: 0; margin-bottom: 0;">Kepala Desa/Lurah : Buruk Bakul</p>
                    <div class="ttd-nama">({{ strtoupper($profilDesa->nama_kepala_desa ?? 'HASANUDIN, SE') }})</div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
