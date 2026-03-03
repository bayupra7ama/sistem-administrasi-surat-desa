<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukProfilController extends Controller
{
    //

    public function index()
    {
        $penduduk = Auth::user();
        return view('penduduk.profil.index', [
            'title' => 'Profil Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function edit()
    {
        $penduduk = Auth::user();
        return view('penduduk.profil.edit', [
            'title' => 'Edit Profil Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $penduduk = User::findOrFail($user->id);

        // VALIDASI SESUAI FORM YANG ADA DI VIEW
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $penduduk->id,
            'password' => 'nullable|string|min:8',
            'nik' => 'required|string|unique:users,nik,' . $penduduk->id,
            'kk' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // UPDATE DATA SESUAI INPUT
        $penduduk->name = $request->name;
        $penduduk->email = $request->email;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->alamat = $request->alamat;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->dusun = $request->dusun;

        // ================================
        // FIELD YANG TIDAK ADA DI VIEW (COMMENT)
        // ================================
        // $penduduk->phone = $request->phone;
        // $penduduk->place_of_birth = $request->place_of_birth;
        // $penduduk->date_of_birth = $request->date_of_birth;
        // $penduduk->pekerjaan = $request->pekerjaan;
        // $penduduk->religion = $request->religion;

        // UPDATE PASSWORD JIKA DIISI
        if ($request->filled('password')) {
            $penduduk->password = bcrypt($request->password);
        }

        // UPLOAD FOTO JIKA ADA
        if ($request->hasFile('photo')) {

            // hapus foto lama
            if ($penduduk->photo_path) {
                Storage::disk('public')->delete($penduduk->photo_path);
            }

            // simpan foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $penduduk->photo_path = $path;
        }

        $penduduk->save();

        return redirect()->route('penduduk.profil')
            ->with('success', 'Data penduduk berhasil diperbarui!');
    }

}
