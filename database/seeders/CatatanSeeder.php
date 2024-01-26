<?php

namespace Database\Seeders;

use App\Models\Catatan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['user_id' => 1, 'nama' => 'Perjalanan 1', 'tanggal' => '2024-01-20', 'waktu' => '16:00:00', 'lokasi' => 'Cipayung', 'suhu' => 36],
            ['user_id' => 2, 'nama' => 'Perjalanan 2', 'tanggal' => '2024-01-18', 'waktu' => '08:00:00', 'lokasi' => 'Ceger', 'suhu' => 38],
            
        ];

        foreach ($data as $value) {
            Catatan::insert([
                'user_id' => $value['user_id'],
                'nama' => $value['nama'],
                'tanggal' => $value['tanggal'],
                'waktu' => $value['waktu'],
                'lokasi' => $value['lokasi'],
                'suhu' => $value['suhu'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
