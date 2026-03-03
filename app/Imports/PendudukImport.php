<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class PendudukImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    public static $imported = 0;
    public static $duplicate = 0;
    public static $error = 0;

    public function model(array $row)
    {
        try {

            // Kolom dari file Excel kamu
            // no
            // no___kk   ← PERBAIKAN PENTING!!!
            // no_identitas
            // nama_lengkap
            // alamat
            // dusun
            // rt
            // rw

            if (!isset($row['no_identitas']) || trim($row['no_identitas']) == '') {
                self::$error++;
                return null;
            }

            $nik = trim($row['no_identitas']);

            if (User::where('nik', $nik)->exists()) {
                self::$duplicate++;
                return null;
            }

            self::$imported++;

            return new User([
                'name' => $row['nama_lengkap'] ?? 'Tanpa Nama',
                'email' => "user{$nik}@desa.local",
                'password' => Hash::make('desaburukbakul45'),

                'nik' => $nik,
                'kk' => $row['no___kk'] ?? null,   // <-- FIX DI SINI
                'alamat' => $row['alamat'] ?? null,
                'dusun' => $row['dusun'] ?? null,
                'rt' => $row['rt'] ?? null,
                'rw' => $row['rw'] ?? null,

                'role' => 'penduduk',
            ]);

        } catch (\Throwable $e) {
            self::$error++;
            return null;
        }
    }

    public function chunkSize(): int
    {
        return 300;
    }
    public function batchSize(): int
    {
        return 300;
    }
}
