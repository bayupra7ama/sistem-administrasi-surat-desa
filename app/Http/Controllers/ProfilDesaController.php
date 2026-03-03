<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profilDesa = ProfilDesa::first();
        return view('admin.profil.index', [
            'title' => 'Profil Desa',
            'profilDesa' => $profilDesa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilDesa $profilDesa)
    {
        //
        return view('admin.profil.edit', [
            'title' => 'Edit Profil Desa',
            'profilDesa' => $profilDesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilDesa $profilDesa)
    {
        //
        // Validasi input
        $request->validate([
            'nama_kelurahan' => 'required|string|max:255',
            'nama_kepala_desa' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string',
            'provinsi' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);


        // Update data profil desa
        $profilDesa->nama_kelurahan = $request->nama_kelurahan;
        $profilDesa->nama_kepala_desa = $request->nama_kepala_desa;
        $profilDesa->email = $request->email;
        $profilDesa->kontak = $request->kontak;
        $profilDesa->alamat = $request->alamat;
        $profilDesa->provinsi = $request->provinsi;
        $profilDesa->kabupaten = $request->kabupaten;
        $profilDesa->website = $request->website;

        // Cek jika ada file logo yang diupload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($profilDesa->logo) {
                Storage::delete($profilDesa->logo);
            }

            // Simpan file logo baru
            $path = $request->file('logo')->store('logos', 'public'); // Simpan di folder 'logos'
            $profilDesa->logo = $path; // Simpan path logo di database
        }

        // Simpan perubahan ke database
        $profilDesa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('profilDesa.index')->with('success', 'Profil desa berhasil diperbarui.');
    }
}
