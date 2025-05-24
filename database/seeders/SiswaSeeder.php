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
            ['nama' => 'ABU BAKAR TSABIT GHUFRON', 'nis' => '20388', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567890', 'status_pkl' => false],
            ['nama' => 'ADE RAFIF DANESWARA', 'nis' => '20389', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567891', 'status_pkl' => false],
            ['nama' => 'ADE ZAIDAN ALTHAF', 'nis' => '20390', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567892', 'status_pkl' => false],
            ['nama' => 'ADHWA KHALILA RAMADHANI', 'nis' => '20391', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567893', 'status_pkl' => false],
            ['nama' => 'ADNAN FARIS', 'nis' => '20392', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567894', 'status_pkl' => false],
            ['nama' => 'AHMAD HANAFFI RAMADHANI', 'nis' => '20393', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567895', 'status_pkl' => false],
            ['nama' => 'AKBAR ADHA KUSUMAWARDHANA', 'nis' => '20394', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567896', 'status_pkl' => false],
            ['nama' => 'ANDHIKA AUGUST FARNAZ', 'nis' => '20395', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567897', 'status_pkl' => false],
            ['nama' => 'ANGELINA THITHIS SEKAR LANGIT', 'nis' => '20396', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567898', 'status_pkl' => false],
            ['nama' => 'ARIFIN NUR IHSAN', 'nis' => '20397', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567899', 'status_pkl' => false],
            ['nama' => 'ARYA EKA RAHMAT PRASETYO', 'nis' => '20398', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567800', 'status_pkl' => false],
            ['nama' => 'ATHIYYA HANIIFA', 'nis' => '20399', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567801', 'status_pkl' => false],
            ['nama' => 'AULIA MAHARANI', 'nis' => '20400', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567802', 'status_pkl' => false],
            ['nama' => 'BIJAK PUTRA FIRMANSYAH', 'nis' => '20401', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567803', 'status_pkl' => false],
            ['nama' => 'CHRISTIAN JAROT FERDIANNDARU', 'nis' => '20402', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567804', 'status_pkl' => false],
            ['nama' => 'DAFFA ARYA SETA', 'nis' => '20403', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567805', 'status_pkl' => false],
            ['nama' => 'DIMAS BAGUS AHMAD NURYASIN', 'nis' => '20404', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567806', 'status_pkl' => false],
            ['nama' => 'EKALAYA KEMAL', 'nis' => '20405', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567807', 'status_pkl' => false],
            ['nama' => 'FADLY ATHALLA FAWWAZ', 'nis' => '20406', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567808', 'status_pkl' => false],
            ['nama' => 'FARADILLA SYIFA NUR’AINI', 'nis' => '20407', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567809', 'status_pkl' => false],
            ['nama' => 'FARCHA AMALIA NUGRAHAINI', 'nis' => '20408', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567810', 'status_pkl' => false],
            ['nama' => 'FAUZAN ADZIMA KURNIAWAN', 'nis' => '20409', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567811', 'status_pkl' => false],
            ['nama' => 'GABRIEL POSSENTI GENTA BAHANA NAGARI', 'nis' => '20410', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567812', 'status_pkl' => false],
            ['nama' => 'GILANG NURHUDA', 'nis' => '20411', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567813', 'status_pkl' => false],
            ['nama' => 'GISELO KRISTIYANTO', 'nis' => '20412', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567814', 'status_pkl' => false],
            ['nama' => 'INTAN LUVIA HISANAH', 'nis' => '20414', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567815', 'status_pkl' => false],
            ['nama' => 'ISNAINI NUR WAHYUNINGSIH', 'nis' => '20415', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567816', 'status_pkl' => false],
            ['nama' => 'IZZUDDIN FAYYEDH HAQ', 'nis' => '20416', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567817', 'status_pkl' => false],
            ['nama' => 'JARDELLA ANGGUN LAVATEKTONIA', 'nis' => '20417', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567818', 'status_pkl' => false],
            ['nama' => 'JECONIA VALE ADYATMA', 'nis' => '20418', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567819', 'status_pkl' => false],
            ['nama' => 'KAYSA AQILA AMTA', 'nis' => '20419', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567820', 'status_pkl' => false],
            ['nama' => 'KEVIN ANDREA GERALDINO', 'nis' => '20420', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567821', 'status_pkl' => false],
            ['nama' => 'LAURENTIUS ANTARA', 'nis' => '20421', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567822', 'status_pkl' => false],
            ['nama' => 'MARCELLINUS PRADIPTA', 'nis' => '20422', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567823', 'status_pkl' => false],
            ['nama' => 'MEIDINNA TIARA AMELIA', 'nis' => '20423', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567824', 'status_pkl' => false],
            ['nama' => 'MICHAEL FARIAN', 'nis' => '20424', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567825', 'status_pkl' => false],
            ['nama' => 'MUSTAFA RAMADHAN', 'nis' => '20425', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567826', 'status_pkl' => false],
            ['nama' => 'NAJLA ARUM SARI', 'nis' => '20426', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567827', 'status_pkl' => false],
            ['nama' => 'NADIA SYIFA MAHESWARI', 'nis' => '20427', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567828', 'status_pkl' => false],
            ['nama' => 'NADIA SAFAH', 'nis' => '20428', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567829', 'status_pkl' => false],
            ['nama' => 'NABILLA RAFAELLA CATHRINA', 'nis' => '20429', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567830', 'status_pkl' => false],
            ['nama' => 'NATHAN ALDO PRATAMA', 'nis' => '20430', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567831', 'status_pkl' => false],
            ['nama' => 'OLIVER GERALD SANTOSO', 'nis' => '20431', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567832', 'status_pkl' => false],
            ['nama' => 'OLIVIA MIRA DEWI', 'nis' => '20432', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567833', 'status_pkl' => false],
            ['nama' => 'QURRATUL AINI HANIFAH', 'nis' => '20433', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567834', 'status_pkl' => false],
            ['nama' => 'RANZEL FALQI RAHMAN', 'nis' => '20434', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567835', 'status_pkl' => false],
            ['nama' => 'RATIH PRIYANTINI', 'nis' => '20435', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567836', 'status_pkl' => false],
            ['nama' => 'RIZAL RAHMAN', 'nis' => '20436', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567837', 'status_pkl' => false],
            ['nama' => 'SATRIA YUDHA PAMUNGKAS', 'nis' => '20437', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567838', 'status_pkl' => false],
            ['nama' => 'SITI MAISAROH', 'nis' => '20438', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567839', 'status_pkl' => false],
            ['nama' => 'TIO KALISTA PATRIA', 'nis' => '20439', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567840', 'status_pkl' => false],
            ['nama' => 'WIRA JAYAWAN', 'nis' => '20440', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567841', 'status_pkl' => false],
            ['nama' => 'YUNUS FEBRIAN SANJAYA', 'nis' => '20441', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567842', 'status_pkl' => false],
            ['nama' => 'ZULAYKHA WARDHANI', 'nis' => '20459', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567843', 'status_pkl' => false],
        ];

        foreach ($data as $item) {
            // Membuat email berdasarkan format nis@sija.com
            $email = "{$item['nis']}@sija.com";

            // Menambahkan email yang sesuai dengan format
            $item['email'] = $email;

            // Memasukkan atau mencari siswa berdasarkan email
            Siswa::firstOrCreate(
                ['email' => $email],
                $item // Menambahkan data lainnya (nama, nis, gender, dll.)
            );
        }
    }
}
