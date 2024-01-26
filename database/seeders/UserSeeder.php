<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'aiu', 'foto' => 'Foto Aiu'],
            ['nama' => 'budi', 'foto' => 'Foto Budi'],
        ];

        foreach ($data as $value) {
            User::insert([
                'nama' => $value['nama'],
                'foto' => $value['foto'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
