<?php

namespace App\Http\Controllers;

use App\Models\WaktuPelayanan;
use App\Http\Requests\StoreWaktuPelayananRequest;
use App\Http\Requests\UpdateWaktuPelayananRequest;
use Illuminate\Http\Request;

class WaktuPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $waktuPelayanan = WaktuPelayanan::all();
        return view('admin.waktu.index', [
            'title' => 'Waktu Pelayanan',
            'waktuPelayanan' => $waktuPelayanan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWaktuPelayananRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WaktuPelayanan $waktuPelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WaktuPelayanan $waktuPelayanan)
    {
        //
        return view('admin.waktu.edit', [
            'title' => 'Edit Waktu Pelayanan',
            'waktuPelayanan' => $waktuPelayanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WaktuPelayanan $waktuPelayanan)
    {
        //
        $request->validate([
            'jam_buka' => 'required',
            'jam_tutup' => 'required|after:jam_buka',
        ]);

        // Update the WaktuPelayanan model
        $waktuPelayanan->jam_buka = $request->jam_buka;
        $waktuPelayanan->jam_tutup = $request->jam_tutup;

        $waktuPelayanan->save();

        return redirect()->route('waktu-pelayanan.index')->with('success', 'Data Waktu Pelayanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WaktuPelayanan $waktuPelayanan)
    {
        //
    }
}
