<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\JenisSurat;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function index()
    {
        // 1️⃣ Jumlah pengajuan per bulan
        $pengajuanPerBulan = Pengajuan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereNotNull('created_at')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Label bulan
        $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        // Isi data default (12 bulan = 0 semua)
        $dataBulan = array_fill(0, 12, 0);

        foreach ($pengajuanPerBulan as $row) {
            if ($row->bulan >= 1 && $row->bulan <= 12) {
                $dataBulan[$row->bulan - 1] = (int) $row->total;
            }
        }

        // 2️⃣ Jumlah pengajuan berdasarkan status
        $statusCounts = Pengajuan::select('status', DB::raw('COUNT(*) as total'))
            ->whereNotNull('status')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // 3️⃣ Jumlah pengajuan per jenis surat
        $jenisSuratCounts = JenisSurat::withCount('pengajuan')->get(['id', 'nama_surat', 'pengajuan_count']);

        // Ubah jadi array untuk Chart.js
        $jenisLabels = $jenisSuratCounts->pluck('nama_surat');
        $jenisData = $jenisSuratCounts->pluck('pengajuan_count');
        
        // ❌ Hapus/Komen baris dd() yang menghentikan eksekusi di sini
        // dd([...]); 
        
        return view('admin.grafik.index', [
            'title' => 'Performa Kinerja',
            'bulanLabels' => $bulanLabels,
            'dataBulan' => $dataBulan,
            'statusCounts' => $statusCounts,
            'jenisLabels' => $jenisLabels,
            'jenisData' => $jenisData,
        ]);
    }
}