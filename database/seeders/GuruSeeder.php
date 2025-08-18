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
            ['nama' => 'Guru 1', 'nip' => '93 928 72836 235', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru1@sija.com'],
            ['nama' => 'Guru 2', 'nip' => '93 928 72836 235', 'gender' => 'P', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru2@sija.com'],
            ['nama' => 'Guru 3', 'nip' => '93 928 72836 235', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru3@sija.com'],
            ['nama' => 'Guru 4', 'nip' => '93 928 72836 235', 'gender' => 'P', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru4@sija.com'],
            ['nama' => 'Guru 5', 'nip' => '93 928 72836 235', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru5@sija.com'],
            ['nama' => 'Guru 6', 'nip' => '93 928 72836 235', 'gender' => 'L', 'alamat' => 'Alamat guru', 'kontak' => '12431342465', 'email' => 'guru6@sija.com'],
        ];

        DB::table('guru')->insert($data);
    }
}
