<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['nama' => 'Sugiarto', 'nip' => '293230523', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'ugik@example.com'],
            ['nama' => 'Yunianto Hermawan', 'nip' => '2014433389', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '457457235', 'email' => 'yuni@example.com'],
            ['nama' => 'Margaretha Endah Titisari', 'nip' => '141243246', 'gender' => 'P', 'alamat' => 'Alamat guru', 'kontak' => '098678436', 'email' => 'endah@example.com'],
            ['nama' => 'Eka Nur Ahmad Romadhoni', 'nip' => '20391241', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '098567235235', 'email' => 'eka@example.com'],
            ['nama' => 'Rr. Retna Trimantaraningsih', 'nip' => '2124120392', 'gender' => 'P', 'alamat' => 'Alamat guru', 'kontak' => '9678745345', 'email' => 'rere@example.com'],
            ['nama' => 'Ratna Yunitasari', 'nip' => '202323393', 'gender' => 'P', 'alamat' => 'Alamat guru', 'kontak' => '08983436346', 'email' => 'ratna@example.com'],
        ];

        DB::table('guru')->insert($data);
    }
}
