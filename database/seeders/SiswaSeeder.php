<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['nis' => '20388', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20389', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20390', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20391', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20392', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20393', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20394', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20395', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20396', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20397', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20398', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20399', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20400', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20401', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20402', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20403', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20404', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20405', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20406', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20407', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20408', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20409', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20410', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20411', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20412', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20414', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20415', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20416', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20417', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20418', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20419', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20420', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20421', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20422', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20423', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20424', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20425', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20426', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20427', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20428', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20429', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20430', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20431', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20432', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20433', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20434', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20435', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20436', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20437', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20438', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20439', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20440', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20441', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
            ['nis' => '20459', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_pkl' => false],
        ];

        foreach ($data as $item) {
            $nama = "Ganti nama siswa";
            // Membuat email berdasarkan format nis@sija.com
            $email = "{$item['nis']}@sija.com";

            // Menambahkan email yang sesuai dengan format
            $item['email'] = $email;
            $item['nama'] = $nama;
            
            // Memasukkan atau mencari siswa berdasarkan email
            Siswa::firstOrCreate(
                ['email' => $email],
                $item // Menambahkan data lainnya (nama, nis, gender, dll.)
            );
        }
    }
}
