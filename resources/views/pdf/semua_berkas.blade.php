<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Semua Berkas {{ $pengajuan->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .berkas { margin-bottom: 40px; page-break-inside: avoid; }
        img { max-width: 100%; height: auto; margin-top: 10px; border: 1px solid #ccc; border-radius: 5px; }
        h3 { border-bottom: 1px solid #ccc; padding-bottom: 5px; }
        iframe { width: 100%; height: 500px; border: none; }
    </style>
</head>
<body>
    <h2>Semua Berkas Pengajuan</h2>
    <p>ID Pengajuan: {{ $pengajuan->id }}</p>

    @foreach ($berkasList as $berkas)
        <div class="berkas">
            <h3>{{ $berkas['nama'] }}</h3>

            @if (in_array(strtolower($berkas['ext']), ['jpg', 'jpeg', 'png']))
                <img src="{{ $berkas['path'] }}">
            @elseif (strtolower($berkas['ext']) === 'pdf')
                <p>(Lampiran PDF: {{ basename($berkas['path']) }})</p>
            @else
                <p>Berkas: {{ basename($berkas['path']) }}</p>
            @endif
        </div>
    @endforeach
</body>
</html>
