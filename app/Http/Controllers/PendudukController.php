<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\PendudukImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // Ambil query pencarian jika ada
        $search = $request->input('search');

        // Filter data berdasarkan pencarian
        $penduduk = User::penduduk()
            ->when($search, function ($query, $search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('dusun', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%")
                        ->orWhere('kk', 'like', "%{$search}%")
                        ->orWhere('alamat', 'like', "%{$search}%")
                        ->orWhere('rt', 'like', value: "%{$search}%")
                        ->orWhere('rw', 'like', value: "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);
        return view('admin.penduduk.index', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.penduduk.create', [
            'title' => 'Tambah Penduduk'
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

        $penduduk = new User();
        $penduduk->name = $request->name;
        $penduduk->email = $request->email;
        $penduduk->phone = $request->phone;
        $penduduk->password = bcrypt($request->password);
        $penduduk->date_of_birth = $request->date_of_birth;
        $penduduk->place_of_birth = $request->place_of_birth;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->religion = $request->religion;
        $penduduk->role = 'penduduk';

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $penduduk->photo_path = $path;
        }

        $penduduk->save();

        return redirect()->route('penduduk.index')->with('success', 'penduduk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $penduduk)
    {
        //
        return view('admin.penduduk.show', [
            'title' => 'Detail Data Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $penduduk)
    {
        //
        return view('admin.penduduk.edit', [
            'title' => 'Edit data penduduk',
            'penduduk' => $penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $penduduk)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $penduduk->id,
            // 'phone' => 'required|string',
            'password' => 'nullable|string|min:8', // Tambahkan konfirmasi password jika diperlukan
            // 'date_of_birth' => 'required|date|before:today',
            'nik' => 'required|string|unique:users,nik,' . $penduduk->id,
            'kk' => 'required|string',
            // 'pekerjaan' => 'required|string',
            'alamat' => 'required|string',

            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',

            // 'religion' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data penduduk
        $penduduk->name = $request->name;
        $penduduk->email = $request->email;
        $penduduk->phone = $request->phone;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $penduduk->password = bcrypt($request->password);
        }

        $penduduk->place_of_birth = $request->place_of_birth;
        $penduduk->date_of_birth = $request->date_of_birth;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->alamat = $request->alamat;

        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->religion = $request->religion;

        // Cek apakah ada file_file_foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus file_file_foto lama jika ada
            if ($penduduk->photo_path) {
                Storage::delete($penduduk->photo_path);
            }

            // Upload file_file_foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $penduduk->photo_path = $path; // Pastikan kolom ini sesuai dengan nama kolom di database
        }

        // Simpan perubahan
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $penduduk)
    {
        //hapus file_file_foto
        if ($penduduk->photo_path && Storage::exists($penduduk->photo_path)) {
            Storage::delete($penduduk->photo_path);
        }

        $penduduk->delete(); // Hapus pengguna
        return redirect()->back()->with('success', 'Penduduk berhasil dihapus!');
    }




    public function import(Request $request)
    {
        @set_time_limit(300);
        @ini_set('memory_limit', '512M');

        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        try {
            $sheet = Excel::toArray([], $request->file('file'))[0];

            if (count($sheet) < 2) {
                return back()->with('error', 'File kosong atau tidak ada data.');
            }

            // =============================
            // 1. VALIDASI HEADER WAJIB
            // =============================
            $header = array_map(function ($v) {
                return strtolower(trim(str_replace([' ', '.'], '', $v)));
            }, $sheet[0]);

            $expected = [
                'no',
                'nokk',
                'noidentitas',
                'namalengkap',
                'alamat',
                'dusun',
                'rt',
                'rw'
            ];

            foreach ($expected as $index => $column) {
                if (!isset($header[$index]) || $header[$index] != $column) {
                    return back()->with(
                        'error',
                        "Format header tidak sesuai! Pastikan urutan:
                    NO, No. KK, No Identitas, Nama Lengkap, Alamat, Dusun, RT, RW"
                    );
                }
            }

            $imported = 0;
            $duplicate = 0;
            $error = 0;

            // ambil semua nik dari file
            $nikList = [];
            foreach ($sheet as $i => $row) {
                if ($i === 0)
                    continue;
                $nikList[] = trim((string) ($row[2] ?? ""));
            }
            $nikList = array_filter($nikList);
            $nikList = array_unique($nikList);

            $existing = DB::table('users')
                ->whereIn('nik', $nikList)
                ->pluck('nik')
                ->toArray();

            $existingSet = array_flip($existing);

            $rowsToInsert = [];
            $now = now();
            $pwd = Hash::make('desaburukbakul45');

            foreach ($sheet as $i => $row) {

                if ($i === 0)
                    continue;

                $nik = trim((string) ($row[2] ?? ""));
                $nama = trim((string) ($row[3] ?? ""));
                $rt = trim((string) ($row[6] ?? ""));
                $rw = trim((string) ($row[7] ?? ""));

                // ====================================
                // 2. VALIDASI DATA PER BARIS
                // ====================================

                // NIK wajib
                if (!$nik || !is_numeric($nik) || strlen($nik) < 8) {
                    $error++;
                    continue;
                }

                // nama wajib
                if (!$nama) {
                    $error++;
                    continue;
                }

                // RT/RW harus angka
                if (($rt && !is_numeric($rt)) || ($rw && !is_numeric($rw))) {
                    $error++;
                    continue;
                }

                // duplikat nik di database
                if (isset($existingSet[$nik])) {
                    $duplicate++;
                    continue;
                }

                $rowsToInsert[] = [
                    'name' => $nama,
                    'email' => "user{$nik}@desa.local",
                    'password' => $pwd,
                    'nik' => $nik,
                    'kk' => $row[1] ?? null,
                    'alamat' => $row[4] ?? null,
                    'dusun' => $row[5] ?? null,
                    'rt' => $rt,
                    'rw' => $rw,
                    'role' => 'penduduk',
                    'created_at' => $now,
                    'updated_at' => $now
                ];

                $existingSet[$nik] = true;
            }

            // INSERT
            foreach (array_chunk($rowsToInsert, 300) as $chunk) {
                DB::table('users')->insert($chunk);
                $imported += count($chunk);
            }

            return back()->with(
                'success',
                "Import BERHASIL!
             ✔ Data Masuk: {$imported}
             ⚠ Duplikat NIK: {$duplicate}
             ❌ Tidak Valid / Error: {$error}"
            );

        } catch (\Throwable $e) {
            \Log::error($e);
            return back()->with('error', 'Kesalahan: ' . $e->getMessage());
        }
    }




}
