<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nik' => 1001001,
            'email' => 'userone@example.com',
            'password' => Hash::make('password123'), // Enkripsi password
            'nama' => 'Budi Yanto',
            'foto' => '-',
        ]);

        // Membuat akun kedua dengan role_id = 2
        User::create([
            'nik' => 1001002,
            'email' => 'usertwo@example.com',
            'password' => Hash::make('password456'), // Enkripsi password
            'nama' => 'Ahmad Dhani',
            'foto' => '-',
        ]);
    }
}
