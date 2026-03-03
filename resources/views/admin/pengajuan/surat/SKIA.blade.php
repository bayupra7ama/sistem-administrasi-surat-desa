<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir KIA - {{ $data['nama_anak'] ?? 'Anak' }}</title>
    <style>
        @page { size: A4 portrait; margin: 0mm; }
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; color: black; background: #e0e0e0; margin: 0; padding: 0; }
        .cetak-area { width: 21cm; min-height: 29.7cm; margin: 1cm auto; padding: 2.5cm 3cm; background: white; box-shadow: 0px 0px 10px rgba(0,0,0,0.2); box-sizing: border-box; position: relative; }
        
        .tabel-data { width: 100%; border-collapse: collapse; margin-top: 30px; }
        .tabel-data td { padding: 8px 0; vertical-align: top; }
        .tabel-data td:nth-child(1) { width: 35%; } /* Label */
        .tabel-data td:nth-child(2) { width: 3%; text-align: center; font-weight: bold;} /* Titik dua */
        .tabel-data td:nth-child(3) { width: 62%; text-transform: uppercase; } /* Value */

        .btn-print { position: fixed; bottom: 20px; right: 20px; padding: 12px 25px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.2); z-index: 1000; font-weight: bold;}
        .btn-print:hover { background: #0056b3; }

        @media print { 
            body { background: white; margin: 1cm; } 
            .cetak-area { margin: 0; padding: 0; box-shadow: none; width: 100%; min-height: auto; }
            .btn-print { display: none !important; } 
        }
    </style>
</head>
<body>
    <button class="btn-print" onclick="window.print()">🖨️ Cetak Form KIA</button>

    <div class="cetak-area">
        <div style="font-weight: bold; font-size: 14pt; margin-bottom: 20px;">
            NO REG : {{ $pengajuan->nomor_surat }}
        </div>

        <table class="tabel-data">
            <tr><td>NAMA ANAK</td><td>:</td><td>{{ $data['nama_anak'] ?? '-' }}</td></tr>
            <tr><td>NIK ANAK</td><td>:</td><td>{{ $data['nik_anak'] ?? '-' }}</td></tr>
            <tr><td>NO KK</td><td>:</td><td>{{ $data['no_kk'] ?? '-' }}</td></tr>
            <tr><td>NO. AKTA KELAHIRAN</td><td>:</td><td>{{ $data['no_akta'] ?? '-' }}</td></tr>
            <tr><td>TEMPAT / TANGGAL LAHIR</td><td>:</td><td>{{ $data['tempat_lahir'] ?? '-' }} / {{ \Carbon\Carbon::parse($data['tanggal_lahir'] ?? now())->translatedFormat('d F Y') }}</td></tr>
            <tr><td>NAMA AYAH</td><td>:</td><td>{{ $data['nama_ayah'] ?? '-' }}</td></tr>
            <tr><td>NAMA IBU</td><td>:</td><td>{{ $data['nama_ibu'] ?? '-' }}</td></tr>
            <tr><td>ALAMAT / DESA</td><td>:</td><td>{{ $data['alamat'] ?? '-' }}</td></tr>
            <tr><td>NAMA PEMOHON</td><td>:</td><td>{{ $data['nama_pemohon'] ?? '-' }}</td></tr>
            <tr><td>TANGGAL PERMOHONAN</td><td>:</td><td>{{ \Carbon\Carbon::parse($data['tanggal_permohonan'] ?? now())->translatedFormat('d F Y') }}</td></tr>
        </table>

        <div style="margin-top: 50px; display: flex; justify-content: space-between;">
            <div style="width: 50%;"></div>
            <div style="width: 40%; text-align: center;">
                <p style="margin-bottom: 70px;">PEMOHON</p>
                <p style="margin: 0; font-weight: bold; text-decoration: underline;">{{ strtoupper($data['nama_pemohon'] ?? '..............................') }}</p>
            </div>
        </div>

        <div style="margin-top: 60px;">
            <p style="font-weight: bold; margin-bottom: 5px;">PERSYARATAN :</p>
            <ol style="margin-top: 0; padding-left: 20px; line-height: 1.6;">
                <li>MENGISI FORMULIR PERMOHONAN KIA</li>
                <li>FOTO COPY AKTA KELAHIRAN</li>
                <li>FOTO COPY KARTU KELUARGA / KK</li>
                <li>FOTO COPY KTP ORANGTUA</li>
                <li>PAS PHOTO 2X3 2 LEMBAR (UMUR 5 TAHUN S/D 17 TAHUN KURANG)</li>
            </ol>
        </div>
    </div>
</body>
</html>