<?php

namespace Database\Seeders;

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
            ['nama' => 'ABU BAKAR TSABIT GHUFRON', 'nis' => '20388', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567890', 'email' => 'abu@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ADE RAFIF DANESWARA', 'nis' => '20389', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567891', 'email' => 'ade@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ADE ZAIDAN ALTHAF', 'nis' => '20390', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567892', 'email' => 'adezaidan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ADHWA KHALILA RAMADHANI', 'nis' => '20391', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567893', 'email' => 'adhwa@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ADNAN FARIS', 'nis' => '20392', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567894', 'email' => 'adnan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'AHMAD HANAFFI RAMADHANI', 'nis' => '20393', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567895', 'email' => 'ahmad@example.com', 'status_pkl' => 'no'],
            ['nama' => 'AKBAR ADHA KUSUMAWARDHANA', 'nis' => '20394', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567896', 'email' => 'akbar@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ANDHIKA AUGUST FARNAZ', 'nis' => '20395', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567897', 'email' => 'andhika@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ANGELINA THITHIS SEKAR LANGIT', 'nis' => '20396', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567898', 'email' => 'angelina@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ARIFIN NUR IHSAN', 'nis' => '20397', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567899', 'email' => 'arifin@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ARYA EKA RAHMAT PRASETYO', 'nis' => '20398', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567800', 'email' => 'arya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ATHIYYA HANIIFA', 'nis' => '20399', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567801', 'email' => 'athiyya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'AULIA MAHARANI', 'nis' => '20400', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567802', 'email' => 'aulia@example.com', 'status_pkl' => 'no'],
            ['nama' => 'BIJAK PUTRA FIRMANSYAH', 'nis' => '20401', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567803', 'email' => 'bijak@example.com', 'status_pkl' => 'no'],
            ['nama' => 'CHRISTIAN JAROT FERDIANNDARU', 'nis' => '20402', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567804', 'email' => 'christian@example.com', 'status_pkl' => 'no'],
            ['nama' => 'DAFFA ARYA SETA', 'nis' => '20403', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567805', 'email' => 'daffa@example.com', 'status_pkl' => 'no'],
            ['nama' => 'DIMAS BAGUS AHMAD NURYASIN', 'nis' => '20404', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567806', 'email' => 'dimas@example.com', 'status_pkl' => 'no'],
            ['nama' => 'EKALAYA KEMAL', 'nis' => '20405', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567807', 'email' => 'ekalaya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'FADLY ATHALLA FAWWAZ', 'nis' => '20406', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567808', 'email' => 'fadly@example.com', 'status_pkl' => 'no'],
            ['nama' => 'FARADILLA SYIFA NUR’AINI', 'nis' => '20407', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567809', 'email' => 'faradilla@example.com', 'status_pkl' => 'no'],
            ['nama' => 'FARCHA AMALIA NUGRAHAINI', 'nis' => '20408', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567810', 'email' => 'farcha@example.com', 'status_pkl' => 'no'],
            ['nama' => 'FAUZAN ADZIMA KURNIAWAN', 'nis' => '20409', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567811', 'email' => 'fauzan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'GABRIEL POSSENTI GENTA BAHANA NAGARI', 'nis' => '20410', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567812', 'email' => 'gabriel@example.com', 'status_pkl' => 'no'],
            ['nama' => 'GILANG NURHUDA', 'nis' => '20411', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567813', 'email' => 'gilang@example.com', 'status_pkl' => 'no'],
            ['nama' => 'GISELO KRISTIYANTO', 'nis' => '20412', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567814', 'email' => 'giselo@example.com', 'status_pkl' => 'no'],
            ['nama' => 'INTAN LUVIA HISANAH', 'nis' => '20414', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567815', 'email' => 'intan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ISNAINI NUR WAHYUNINGSIH', 'nis' => '20415', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567816', 'email' => 'isnaini@example.com', 'status_pkl' => 'no'],
            ['nama' => 'IZZUDDIN FAYYEDH HAQ', 'nis' => '20416', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567817', 'email' => 'izzuddin@example.com', 'status_pkl' => 'no'],
            ['nama' => 'JARDELLA ANGGUN LAVATEKTONIA', 'nis' => '20417', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567818', 'email' => 'jardella@example.com', 'status_pkl' => 'no'],
            ['nama' => 'JECONIA VALE ADYATMA', 'nis' => '20418', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567819', 'email' => 'jeconia@example.com', 'status_pkl' => 'no'],
            ['nama' => 'KAYSA AQILA AMTA', 'nis' => '20419', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567820', 'email' => 'kaysa@example.com', 'status_pkl' => 'no'],
            ['nama' => 'KEVIN ANDREA GERALDINO', 'nis' => '20420', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567821', 'email' => 'kevin@example.com', 'status_pkl' => 'no'],
            ['nama' => 'LAURENTIUS ANTARA', 'nis' => '20421', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567822', 'email' => 'laurentiu@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MARCELLINUS PRADIPTA', 'nis' => '20422', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567823', 'email' => 'marcellinus@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MEIDINNA TIARA PRAMUDHITA', 'nis' => '20423', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567824', 'email' => 'meidinna@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MEYLANI TRINURDIAH', 'nis' => '20424', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567825', 'email' => 'meylani@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MUH. BENI ABDULLOH', 'nis' => '20425', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567826', 'email' => 'beni@example.com', 'status_pkl' => 'no'],
            ['nama' => 'FAIRUZIZUAN AZZURI', 'nis' => '20427', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567827', 'email' => 'fairuz@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MUHAMMAD NAQSYABAND EFFENDI', 'nis' => '20428', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567828', 'email' => 'naqsyaband@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MUHAMMAD RAFI ANSHORY', 'nis' => '20429', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567829', 'email' => 'rafi@example.com', 'status_pkl' => 'no'],
            ['nama' => 'MUHAMMAD RAFLI QAIDUL NADHIF', 'nis' => '20430', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567830', 'email' => 'rafli@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NABILA NUR AZIZAH', 'nis' => '20432', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567831', 'email' => 'nabila@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NAFISYA RHEA PRAYASTI', 'nis' => '20433', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567832', 'email' => 'nafisya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NAUFELIRNA RAMADHANI', 'nis' => '20434', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567833', 'email' => 'naufelirna@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NAUVAL AT THARIQ', 'nis' => '20435', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567834', 'email' => 'nauval@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NUR CHESYA PUSPITASARI', 'nis' => '20437', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567835', 'email' => 'chesya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NUR RAHMAN RIFAI', 'nis' => '20438', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567836', 'email' => 'rifai@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NUR RAMADHANI SAPUTRA', 'nis' => '20439', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567837', 'email' => 'ramadhani@example.com', 'status_pkl' => 'no'],
            ['nama' => 'NUR RIJALUL ANNAM', 'nis' => '20440', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567838', 'email' => 'rijalul@example.com', 'status_pkl' => 'no'],
            ['nama' => 'PEMBAYUN MAYA RIYANI', 'nis' => '20441', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567839', 'email' => 'pembayun@example.com', 'status_pkl' => 'no'],
            ['nama' => 'RAFA ALI KHOMAINI', 'nis' => '20443', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567840', 'email' => 'rafaali@example.com', 'status_pkl' => 'no'],
            ['nama' => 'RAFA ANAN WARDANA', 'nis' => '20444', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567841', 'email' => 'rafaanan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'REYQAL KHAIRULLAH RINDUWAN', 'nis' => '20445', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567842', 'email' => 'reyqal@example.com', 'status_pkl' => 'no'],
            ['nama' => 'RIENTANIA WAFANISA SARWADITA', 'nis' => '20447', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567843', 'email' => 'rientania@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ROBERTHO DARRELL', 'nis' => '20449', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567844', 'email' => 'robertho@example.com', 'status_pkl' => 'no'],
            ['nama' => 'SABIAN RAKA PRAMUDITYA', 'nis' => '20450', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567845', 'email' => 'sabian@example.com', 'status_pkl' => 'no'],
            ['nama' => 'SALWA AZ-ZAHRA MIZAR', 'nis' => '20451', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567846', 'email' => 'salwa@example.com', 'status_pkl' => 'no'],
            ['nama' => 'SHAFWAN ILHAM DZAKY', 'nis' => '20452', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567847', 'email' => 'shafwan@example.com', 'status_pkl' => 'no'],
            ['nama' => 'SURYA ANDHIKA PUTRI', 'nis' => '20453', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567848', 'email' => 'surya@example.com', 'status_pkl' => 'no'],
            ['nama' => 'TSABITA IRENE ADIELIA', 'nis' => '20455', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567849', 'email' => 'tsabita@example.com', 'status_pkl' => 'no'],
            ['nama' => 'VINCENTIUS REYNARA EZRATAMA', 'nis' => '20456', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567850', 'email' => 'vincent@example.com', 'status_pkl' => 'no'],
            ['nama' => 'YOHANES FAREL KRISTIAWAN', 'nis' => '20457', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => '1234567851', 'email' => 'yohanes@example.com', 'status_pkl' => 'no'],
            ['nama' => 'YUMNA PUTRI NURJANAH', 'nis' => '20458', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567852', 'email' => 'yumna@example.com', 'status_pkl' => 'no'],
            ['nama' => 'ZULAYKHA WARDHANI', 'nis' => '20459', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => '1234567890', 'email' => 'zulaykha@example.com', 'status_pkl' => 'no'],
        ];

        DB::table('siswa')->insert($data);
    }
}
