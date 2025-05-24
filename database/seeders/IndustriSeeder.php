<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 25; $i++) {
            $data[] = [
                'nama' => 'Perusahaan ' . $i,
                'bidang_usaha' => ['Teknologi', 'Manufaktur', 'Garmen', 'Kerajinan', 'Kuliner'][rand(0, 4)],
                'alamat' => 'Alamat lengkap perusahaan ke-' . $i,
                'kontak' => '08' . rand(1111111111, 9999999999),
                'email' => 'email' . $i . '@example.com',
                'guru_pembimbing' => rand(1, 5), // Pastikan id guru ini ada
                'website' => 'https://www.perusahaan' . $i . '.com',
                'foto' => 'foto' . $i . '.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('industri')->insert($data);
    }
}
