<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilDesa;
use Faker\Factory as Faker;

class ProfilDesaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Menambahkan satu baris data dummy
        ProfilDesa::create([
            'nama_kepala_desa' => 'nama Kelapa Desa',
            'nama_kelurahan' => 'Buruk Bakul',
            'email' => 'desaburukbakul@gmail.com',
            'kontak' => 'kontak kelurahan',
            'website' => 'desaburukbakul.gov.id',
            'provinsi' => 'Riau',
            'kabupaten' => 'Bengkalis',
            'alamat' => ' Buruk Bakul, Kec. Bukit Batu, Kabupaten Bengkalis, Riau',
        ]);
    }
}
