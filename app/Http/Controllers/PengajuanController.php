<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    //
    public function create($kode)
    {
        // Cari jenis surat berdasarkan kode
        $jenisSurat = JenisSurat::where('kode', $kode)->firstOrFail();
        $penduduk = Auth::user();

        return view('penduduk.pengajuan.form', [
            'title' => 'formulir ' . $jenisSurat->nama_surat,
            'jenisSurat' => $jenisSurat,
            'penduduk' => $penduduk
        ]);
    }

    public function list($kode)
    {
        // Cari ID jenis_surat berdasarkan kode
        $jenisSurat = JenisSurat::where('kode', $kode)->first();

        if (!$jenisSurat) {
            abort(404, 'Jenis surat tidak ditemukan');
        }

        // Ambil semua pengajuan dengan jenis_surat_id yang sesuai
        $pengajuans = Pengajuan::where('jenis_surat_id', $jenisSurat->id)->latest()->paginate(10);
        return view('admin.pengajuan.list', [
            'title' => 'pengajuan',
            'pengajuans' => $pengajuans,
            'kode' => $kode
        ]);
    }

    public function submit(Request $request, $kode)
    {
        $jenisSurat = JenisSurat::where('kode', $kode)->first();
        if (!$jenisSurat) {
            return redirect()->route('dashboard.penduduk')->with('error', 'Jenis surat tidak ditemukan!');
        }

        // Ambil data penduduk dari user yang sedang login
        $penduduk = Auth::user();

        // Validasi hanya file syaratnya
        $rules = [];

        switch ($kode) {
            case 'SD': // Surat Dispensasi
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPP': // Surat Pengantar Perpindahan Penduduk
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_buku_nikah'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SKIA': // Surat Pengantar Pembuatan KIA
                $rules['file_akte'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp_ortu'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_foto'] = 'required|file|mimes:jpg,jpeg,png|max:2048';
                break;
            case 'SPEK': // Surat Pernyataan Perubahan Elemen Kependudukan
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SKD': // Surat Keterangan Domisili
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPN': // Surat Pengantar Nikah
                $rules['ktp_pemohon'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_pasangan'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_ortu'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['surat_pengantar_rt'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SKU': // Surat Keterangan Usaha
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['surat_pengantar_rt'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';

                break;
            case 'SKTM': // Surat Keterangan Tidak Mampu
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['surat_pengantar_rt'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPIK': // Surat Pengantar Izin Keramaian
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPKK': // Surat Pengantar Pembuatan KK
                $rules['surat_pindah'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_asli'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_buku_nikah'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPAK': // Surat Pengantar Pembuatan Akte Kelahiran
                $rules['file_kk'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp_ortu'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_saksi'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['surat_nikah'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['bukti_lahir'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPKM': // Surat Pengantar Pembuatan Akte Kematian
                $rules['ktp_meninggal'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_saksi_1'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_saksi_2'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
        }

        // Validasi file syarat
        $validated = $request->validate($rules);

        $pengajuan = new Pengajuan();
        $pengajuan->penduduk_id = $penduduk->id;
        $pengajuan->jenis_surat_id = $jenisSurat->id;
        $pengajuan->status = 'Menunggu'; // Atur default menunggu

        // ==========================================
        // PERBAIKAN: Ambil semua teks DAN file
        // ==========================================
        $dataPengajuan = $request->except(['_token', '_method']);

        // Upload file ke folder public/syarat/{kode} dan timpa nilainya di array
        foreach ($request->allFiles() as $key => $file) {
            $path = $file->store("syarat/$kode", 'public');
            $dataPengajuan[$key] = $path;
        }

        // Simpan dalam format JSON
        $pengajuan->data = json_encode($dataPengajuan);
        $pengajuan->save();

        return redirect()->route('penduduk.riwayat.surat')
            ->with('success', 'Pengajuan berhasil dikirim.');
    }


    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->data = json_decode($pengajuan->data, true);
        return view('admin.pengajuan.detail', [
            'title' => 'detail pengajuan',
            'pengajuan' => $pengajuan
        ]);
    }

    public function approve(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Pesan opsional (boleh kosong)
        $pengajuan->pesan_admin = $request->input('pesan_admin');

        // Ubah status jadi Approved
        $pengajuan->status = 'Approved';

        // Buat nomor surat
        $tanggal = now()->format('Ymd');
        $nomorUrut = Pengajuan::whereDate('created_at', now()->toDateString())->count() + 1;
        $kodeSurat = $pengajuan->jenisSurat->kode;
        $nomorSurat = sprintf('%03d/%s/%s', $nomorUrut, $kodeSurat, $tanggal);

        $pengajuan->nomor_surat = $nomorSurat;
        $pengajuan->save();

        return redirect()->route('pengajuan.list', ['kode' => $kodeSurat])
            ->with('success', 'Pengajuan berhasil disetujui dengan nomor surat: ' . $nomorSurat);
    }



    public function reject(Request $request, $id)
    {
        $request->validate([
            'pesan_admin' => 'required|string|max:500'
        ], [
            'pesan_admin.required' => 'Pesan wajib diisi saat menolak pengajuan.'
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'Rejected';
        $pengajuan->pesan_admin = $request->input('pesan_admin');
        $pengajuan->save();

        $kode = $pengajuan->jenisSurat->kode;
        return redirect()->route('pengajuan.list', ['kode' => $kode])
            ->with('success', 'Pengajuan berhasil ditolak dengan pesan kepada pemohon.');
    }


    public function download($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'Approved') {
            return redirect()->route('pengajuan.list', ['kode' => $pengajuan->jenisSurat->kode])
                ->with('error', 'Surat belum di-ACC, tidak dapat diunduh.');
        }

        try {
            $filePath = $pengajuan->getRawOriginal('file_surat');

            if (!Storage::disk('public')->exists($filePath)) {
                throw new \Exception('File tidak ditemukan di path: ' . $filePath);
            }

            return Storage::disk('public')->download($filePath);
        } catch (\Exception $e) {
            Log::error('Error downloading file: ' . $e->getMessage());
            return redirect()
                ->route('pengajuan.list', ['kode' => $pengajuan->jenisSurat->kode])
                ->with('error', 'Error saat mengunduh file: ' . $e->getMessage());
        }
    }

    public function riwayat(Request $request)
    {
        // Ambil data pencarian dari input
        $search = $request->input('search');

        // Ambil data pengajuan milik pengguna saat ini
        if (Auth::user()->role == 'admin') {
            // Jika admin, dapat melihat semua riwayat surat yang disetujui
            $riwayatSurat = Pengajuan::where('status', 'Approved')
                ->when($search, function ($query, $search) {
                    // Filter berdasarkan kode surat (jenisSurat->kode), nama pemohon, jenis surat, atau status
                    $query->whereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('kode', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('nama_surat', 'like', '%' . $search . '%');
                    })
                        ->orWhere('status', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->appends(['search' => $search]); // Menjaga query pencarian saat paginasi
            return view('penduduk.riwayat.riwayat', [
                'title' => 'Riwayat Surat',
                'riwayatSurat' => $riwayatSurat,
                'search' => $search
            ]);
        } else {
            // Jika pengguna biasa, hanya melihat riwayat surat miliknya
            $riwayatSurat = Pengajuan::where('penduduk_id', Auth::user()->id)
                ->when($search, function ($query, $search) {
                    // Filter berdasarkan kode surat (jenisSurat->kode), jenis surat, atau status
                    $query->whereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('kode', 'like', '%' . $search . '%');
                    })
                        ->orWhereHas('jenisSurat', function ($q) use ($search) {
                        $q->where('nama_surat', 'like', '%' . $search . '%');
                    })
                        ->orWhere('status', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10)
                ->appends(['search' => $search]); // Menjaga query pencarian saat paginasi
            return view('penduduk.riwayat.riwayat', [
                'title' => 'Riwayat Surat',
                'riwayatSurat' => $riwayatSurat,
                'search' => $search
            ]);
        }
    }

    // dwonload semua berkas"
    public function downloadAll($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // Pastikan $files jadi array
        $files = is_array($pengajuan->data)
            ? $pengajuan->data
            : json_decode($pengajuan->data, true);

        $berkasList = [];

        foreach ($files as $nama => $path) {
            $fullPath = storage_path('app/public/' . $path);

            if (file_exists($fullPath)) {
                $berkasList[] = [
                    'nama' => ucwords(str_replace('_', ' ', $nama)),
                    'path' => $fullPath,
                    'ext' => pathinfo($fullPath, PATHINFO_EXTENSION),
                ];
            }
        }

        $pdf = Pdf::loadView('pdf.semua_berkas', compact('berkasList', 'pengajuan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('semua_berkas_' . $pengajuan->id . '.pdf');
    }

    public function print($id)
    {
        $pengajuan = Pengajuan::with('jenisSurat', 'user')->findOrFail($id);

        if ($pengajuan->status !== 'Approved') {
            return redirect()->back()->with('error', 'Surat belum disetujui, tidak dapat dicetak.');
        }

        $data = is_string($pengajuan->data) ? json_decode($pengajuan->data, true) : $pengajuan->data;
        $kodeSurat = $pengajuan->jenisSurat->kode;

        $viewName = 'admin.pengajuan.surat.' . $kodeSurat;

        if (!view()->exists($viewName)) {
            return redirect()->back()->with('error', 'Template cetak untuk jenis surat ' . $kodeSurat . ' belum dibuat.');
        }

        // Ambil profil desa untuk logo
        $profilDesa = ProfilDesa::first();

        return view($viewName, compact('pengajuan', 'data', 'profilDesa'));
    }

    // Menampilkan halaman Edit khusus surat yang ditolak
    public function edit($id)
    {
        $pengajuan = Pengajuan::where('id', $id)->where('penduduk_id', Auth::id())->firstOrFail();

        if ($pengajuan->status !== 'Rejected') {
            return redirect()->route('penduduk.riwayat.surat')->with('error', 'Hanya pengajuan yang ditolak yang bisa diperbaiki.');
        }

        $jenisSurat = $pengajuan->jenisSurat;
        $penduduk = Auth::user();
        $isian = is_string($pengajuan->data) ? json_decode($pengajuan->data, true) : $pengajuan->data;

        return view('penduduk.pengajuan.edit', [
            'title' => 'Perbaiki Formulir ' . $jenisSurat->nama_surat,
            'jenisSurat' => $jenisSurat,
            'penduduk' => $penduduk,
            'pengajuan' => $pengajuan,
            'isian' => $isian
        ]);
    }

    // Memproses update data dari warga
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::where('id', $id)->where('penduduk_id', Auth::id())->firstOrFail();

        if ($pengajuan->status !== 'Rejected') {
            return redirect()->route('penduduk.riwayat.surat')->with('error', 'Pengajuan tidak dapat diedit.');
        }

        $kode = $pengajuan->jenisSurat->kode;
        $rules = [];

        // Aturan file sama dengan fungsi submit(), TAPI kita buat 'nullable' (Boleh kosong)
        // Karena warga mungkin hanya ingin mengubah teks, bukan filenya.
        switch ($kode) {
            case 'SD':
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPP':
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_buku_nikah'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SKIA':
                $rules['file_akte'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp_ortu'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_foto'] = 'nullable|file|mimes:jpg,jpeg,png|max:2048';
                break;
            case 'SPEK':
            case 'SKD':
            case 'SPIK':
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPN':
            case 'SPAK':
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_ortu'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_ktp_ortu'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SKU':
            case 'SKTM':
                $rules['file_ktp'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['file_kk'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['surat_pengantar_rt'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
            case 'SPKM':
                $rules['ktp_meninggal'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_saksi_1'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                $rules['ktp_saksi_2'] = 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048';
                break;
        }

        $request->validate($rules);

        $dataPengajuan = is_string($pengajuan->data) ? json_decode($pengajuan->data, true) : (array) $pengajuan->data;
        $inputBaru = $request->except(['_token', '_method']);

        // 1. Update data teks
        foreach ($inputBaru as $key => $val) {
            if (!$request->hasFile($key)) {
                $dataPengajuan[$key] = $val;
            }
        }

        // 2. Update file JIKA ADA file baru yang diunggah
        foreach ($request->allFiles() as $key => $file) {
            // Hapus file lama dari storage agar server tidak penuh
            if (isset($dataPengajuan[$key]) && Storage::disk('public')->exists($dataPengajuan[$key])) {
                Storage::disk('public')->delete($dataPengajuan[$key]);
            }
            $path = $file->store("syarat/$kode", 'public');
            $dataPengajuan[$key] = $path; // Timpa dengan file baru
        }

        $pengajuan->data = json_encode($dataPengajuan);
        $pengajuan->status = 'Menunggu'; // Kembalikan ke antrean Admin
        $pengajuan->pesan_admin = null; // Hapus pesan error sebelumnya
        $pengajuan->save();

        return redirect()->route('penduduk.riwayat.surat')->with('success', 'Pengajuan berhasil diperbaiki dan dikirim ulang ke Admin.');
    }
}
