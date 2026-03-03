<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengajuan;
use App\Models\User;
use App\Models\JenisSurat;
use Illuminate\Support\Arr;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua penduduk (role = penduduk)
        $pendudukIds = User::where('role', 'penduduk')->pluck('id')->toArray();

        // Kalau belum ada penduduk, buat dummy minimal 5 orang
        if (empty($pendudukIds)) {
            for ($i = 1; $i <= 5; $i++) {
                $user = User::create([
                    'name' => 'Penduduk ' . $i,
                    'email' => 'penduduk' . $i . '@gmail.com',
                    'nik' => '32010101010' . $i,
                    'password' => bcrypt('password'),
                    'role' => 'penduduk',
                ]);
                $pendudukIds[] = $user->id;
            }
        }

        // Ambil semua jenis surat
        $jenisIds = JenisSurat::pluck('id')->toArray();

        // Status yang mungkin
        $statuses = ['Menunggu', 'Disetujui', 'Ditolak'];

        // Buat 80 data pengajuan acak selama 12 bulan terakhir
        for ($i = 1; $i <= 80; $i++) {
            Pengajuan::create([
                'jenis_surat_id' => Arr::random($jenisIds),
                'penduduk_id' => Arr::random($pendudukIds),
                'status' => Arr::random($statuses),
                'data' => [
                    'kk' => 'berkas/kk' . $i . '.pdf',
                    'ktp' => 'berkas/ktp' . $i . '.pdf',
                ],
                'nomor_surat' => 'SR-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'file_surat' => null,
                'pesan_admin' => null,
                'created_at' => now()->subMonths(rand(0, 11))->startOfMonth()->addDays(rand(0, 28)),
            ]);
        }
    }
}
