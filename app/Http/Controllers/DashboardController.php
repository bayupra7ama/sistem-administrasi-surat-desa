<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\WaktuPelayanan;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $penduduk = User::penduduk()->count();
        $admin = User::admin()->count();
        $waktuPelayanan = WaktuPelayanan::count();
        $jenisSurat = JenisSurat::count();
        $approvedCount = Pengajuan::where('status', 'Approved')->count();
        $rejectedCount = Pengajuan::where('status', 'Rejected')->count();
        $waitingCount = Pengajuan::where('status', 'Menunggu')->count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk,
            'admin' => $admin,
            'waktuPelayanan' => $waktuPelayanan,
            'jenisSurat' => $jenisSurat,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount,
            'waitingCount' => $waitingCount,
        ]);
    }
}
