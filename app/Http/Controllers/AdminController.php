<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admin = User::admin()->latest()->get();
        return view('admin.index', [
            'title' => 'Admin',
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create', [
            'title' => 'Tambah Admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'password' => 'required|string|min:8',
            'date_of_birth' => 'required|date|before:today',
            'place_of_birth' => 'required|string|max:255',
            'nik' => 'required|string|unique:users',
            'kk' => 'required|string',
            'pekerjaan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'religion' => 'required|string',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->date_of_birth = $request->date_of_birth;
        $admin->place_of_birth = $request->place_of_birth;
        $admin->nik = $request->nik;
        $admin->kk = $request->kk;
        $admin->pekerjaan = $request->pekerjaan;
        $admin->rt = $request->rt;
        $admin->rw = $request->rw;
        $admin->religion = $request->religion;
        $admin->role = 'admin';

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $admin->photo_path = $path;
        }

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        //
        return view('admin.show', [
            'title' => 'Detail Data Admin',
            'penduduk' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        //
        return view('admin.edit', [
            'title' => 'Edit data admin',
            'penduduk' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        // VALIDASI SESUAI INPUT DI VIEW
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
            'nik' => 'required|string|unique:users,nik,' . $admin->id,
            'kk' => 'required|string',
            'alamat' => 'required|string',

            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // UPDATE DATA SESUAI VIEW
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->nik = $request->nik;
        $admin->alamat = $request->alamat;

        $admin->kk = $request->kk;
        $admin->rt = $request->rt;
        $admin->rw = $request->rw;
        $admin->dusun = $request->dusun;

        // ================================
        // FIELD YANG TIDAK ADA DI VIEW → COMMENT
        // ================================
        // $admin->phone = $request->phone;
        // $admin->place_of_birth = $request->place_of_birth;
        // $admin->date_of_birth = $request->date_of_birth;
        // $admin->pekerjaan = $request->pekerjaan;
        // $admin->religion = $request->religion;

        // UPDATE PASSWORD JIKA ADA
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        // UPLOAD FOTO
        if ($request->hasFile('photo')) {

            //hapus foto lama
            if ($admin->photo_path) {
                Storage::disk('public')->delete($admin->photo_path);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $admin->photo_path = $path;
        }

        $admin->save();

        return redirect()->route('admin.index')
            ->with('success', 'Data admin berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        //
        //hapus file_foto
        if ($admin->photo_path && Storage::exists($admin->photo_path)) {
            Storage::delete($admin->photo_path);
        }

        $admin->delete(); // Hapus pengguna
        return redirect()->back()->with('success', 'admin berhasil dihapus!');
    }
}
