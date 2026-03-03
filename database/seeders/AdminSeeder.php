<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            
            User::create([
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'nik' => '11721172',
                'password' => Hash::make('adminganteng123'), // Pastikan menggunakan Hash untuk keamanan
                'role' => 'admin', // Pastikan ada kolom "role" di tabel Anda
            ]);

        //  User::create([
        //     'name' => 'wardes',
        //     'email' => 'waed1es@gmail.com',
        //     'nik' => '080920',
        //     'password' => Hash::make('password'), // Pastikan menggunakan Hash untuk keamanan
        //     'role' => 'user', // Pastikan ada kolom "role" di tabel Anda
        // ]);
    }
}
