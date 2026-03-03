<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Http\Requests\StoreJenisSuratRequest;
use App\Http\Requests\UpdateJenisSuratRequest;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jenisSurat = JenisSurat::all();
        return view('admin.jenis.index', [
            'title' => 'Jenis Surat',
            'jenisSurat' => $jenisSurat
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
    public function store(StoreJenisSuratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSurat $jenisSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisSurat $jenisSurat)
    {
        //
        return view('admin.jenis.edit', [
            'title' => 'Edit Jenis Surat',
            'jenisSurat' => $jenisSurat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSurat $jenisSurat)
    {
        //
        $request->validate([
            'deskripsi' => 'required|string'
        ]);

        $jenisSurat->deskripsi = $request->deskripsi;

        $jenisSurat->save();

        return redirect()->route('jenis-surat.index')->with('success', 'Data Jenis Surat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSurat $jenisSurat)
    {
        //
    }
}
