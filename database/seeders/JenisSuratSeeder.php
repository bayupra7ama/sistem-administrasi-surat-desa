<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('jenis_surats')->insert([
            [
                'nama_surat' => 'Surat Dispensasi',
                'kode'       => 'SD',
                'deskripsi'  => 'Surat keterangan dispensasi untuk keperluan tertentu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Pengantar Perpindahan Penduduk',
                'kode'       => 'SPP',
                'deskripsi'  => 'Surat pengantar untuk proses perpindahan domisili penduduk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Pengantar Pembuatan KIA',
                'kode'       => 'SKIA',
                'deskripsi'  => 'Surat pengantar untuk pembuatan Kartu Identitas Anak (KIA).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Pernyataan Perubahan Elemen Kependudukan',
                'kode'       => 'SPEK',
                'deskripsi'  => 'Surat pengantar dari kelurahan untuk pembuatan SKCK di kepolisian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Usaha',
                'kode'       => 'SKU',
                'deskripsi'  => 'Surat yang menerangkan kepemilikan dan aktivitas usaha warga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Tidak Mampu',
                'kode'       => 'SKTM',
                'deskripsi'  => 'Surat keterangan tidak mampu untuk keperluan bantuan sosial, sekolah, atau lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_surat' => 'Surat Keterangan Domisili',
                'kode'       => 'SKD',
                'deskripsi'  => 'Surat yang menerangkan alamat tempat tinggal resmi warga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
            
            [
                'nama_surat' => 'Surat Pengantar Nikah',
                'kode'       => 'SPN',
                'deskripsi'  => 'Surat untuk pengantar jika ingin menikah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
            
           

           

             [
                'nama_surat' => 'Surat Pengantar Izin Keramaian',
                'kode'       => 'SPIK',
                'deskripsi'  => 'Surat pengantar izin keramaian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nama_surat' => 'Surat Pengantar Pembuatan KK',
                'kode'       => 'SPKK',
                'deskripsi'  => 'Surat Pengantar Pembuatan KK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'nama_surat' => 'Surat Pengantar Pembuatan Akte Kelahiran',
                'kode'       => 'SPAK',
                'deskripsi'  => 'Surat pengantar untuk pembuatan AKte Identitas Anak .',
                'created_at' => now(),
                'updated_at' => now(),
            ],

              [
                'nama_surat' => 'Surat Keterangan Kematian',
                'kode'       => 'SPKM',
                'deskripsi'  => 'Surat pengantar membuat akte kematian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



