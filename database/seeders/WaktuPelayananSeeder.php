<?php

namespace Database\Seeders;

use Database\Factories\WaktuPelayananFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hariKerja = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        foreach ($hariKerja as $hari) {
            DB::table('waktu_pelayanans')->insert([
                'hari' => $hari,
                'jam_buka' => '08:00:00',  // Jam buka
                'jam_tutup' => '16:00:00', // Jam tutup
            ]);
        }
    }
}
