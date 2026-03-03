<?php

namespace App\Http\Controllers\penduduk;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\WaktuPelayanan;
use App\Http\Controllers\Controller;

class PendudukDashboardController extends Controller
{
    //
    public function index()
    {
        $waktuPelayanan = WaktuPelayanan::get();
        $jenisSurat = JenisSurat::get();
        return view('penduduk.dashboard', [
            'title' => 'Dashboard',
            'jenisSurat' => $jenisSurat,
            'waktuPelayanan' => $waktuPelayanan
        ]);
    }
}
