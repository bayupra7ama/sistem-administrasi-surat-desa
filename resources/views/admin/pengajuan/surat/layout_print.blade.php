<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat {{ $pengajuan->jenisSurat->nama_surat }}</title>
    <style>
        /* ========================================= */
        /* PENGATURAN KERTAS & HILANGKAN URL BROWSER */
        /* ========================================= */
        @page {
            size: A4 portrait;
            margin: 0mm;
            /* WAJIB 0mm untuk menghilangkan URL dan Tanggal bawaan browser */
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: black;
            background: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        /* ========================================= */
        /* KOTAK KERTAS DI LAYAR PREVIEW             */
        /* ========================================= */
        .cetak-area {
            width: 21cm;
            min-height: 29.7cm;
            /* Gunakan min-height agar lebih elastis */
            margin: 1cm auto;
            padding: 1.5cm 2cm;
            /* Padding atas bawah diperkecil sedikit agar muat 1 lembar */
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            position: relative;
        }

        /* Kop Surat */
        .kop-surat {
            width: 100%;
            border-bottom: 3px solid black;
            margin-bottom: 2px;
            padding-bottom: 5px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .kop-surat-inner {
            border-bottom: 1px solid black;
            padding-bottom: 2px;
            margin-bottom: 15px;
        }

        .logo {
            width: 80px;
            position: absolute;
            left: 0;
            top: 0;
        }

        .teks-kop {
            text-align: center;
            width: 100%;
            /* padding-left: 90px; */
        }

        .teks-kop h4 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            line-height: 1.2;
        }

        .teks-kop h3 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
            text-decoration: underline;
            line-height: 1.2;
        }

        .teks-kop p {
            margin: 0;
            font-size: 11pt;
            line-height: 1.2;
        }

        /* Konten Surat */
        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-bottom: 0;
            margin-top: 10px;
        }

        .nomor-surat {
            text-align: center;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .tabel-data {
            width: 100%;
            margin-left: 20px;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        .tabel-data td {
            padding: 2px 0;
            vertical-align: top;
        }

        .tabel-data td:nth-child(1) {
            width: 30%;
        }

        .tabel-data td:nth-child(2) {
            width: 3%;
            text-align: center;
        }

        /* Paragraf & Jarak Spasi */
        .paragraf {
            text-align: justify;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        /* Rapatkan line-height ke 1.3 */
        .indent {
            text-indent: 40px;
        }

        /* Tanda Tangan */
        .ttd-container {
            width: 100%;
            margin-top: 20px;
            page-break-inside: avoid;
            /* Mencegah kolom tanda tangan terpotong ke halaman 2 */
        }

        .ttd-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ttd-table td {
            width: 50%;
            vertical-align: top;
            text-align: center;
        }

        .ttd-nama {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 60px;
        }

        /* Jarak ttd diperkecil agar tidak makan tempat */

        /* Tombol Print (Di Layar) */
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

        /* ========================================= */
        /* MODE SAAT DI PRINT KE MESIN PRINTER       */
        /* ========================================= */
        @media print {
            body {
                background: white;
                margin: 1cm;
            }

            /* Beri margin di kertas print-nya */
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

            /* Sembunyikan tombol secara paksa */
        }
    </style>
</head>

<body>

    <button class="btn-print" onclick="window.print()">🖨️ Cetak Surat</button>

    <div class="cetak-area">
        <div class="kop-surat-inner">
            <div class="kop-surat">
                @if ($profilDesa && $profilDesa->logo)
                    <img src="{{ asset('storage/' . $profilDesa->logo) }}"alt="Logo" class="logo">
                @else
                    <img src="{{ asset('template/dist/assets/img/avatar/avatar-2.png') }}"alt="Logo Default"
                        class="logo">
                @endif

                <div class="teks-kop">
                    <h4>PEMERINTAH KABUPATEN BENGKALIS</h4>
                    <h4>KECAMATAN BUKIT BATU</h4>
                    <h3>DESA BURUK BAKUL</h3>
                    <p>Jl. Sri Menanti No.001, Desa Buruk Bakul, Kode Pos 28761</p>
                    <p>Email : {{ $profilDesa->email ?? 'pemerintahdesaburukbakul@gmail.com' }}</p>
                </div>
            </div>
        </div>

        @yield('content')

    </div>
</body>

</html>
