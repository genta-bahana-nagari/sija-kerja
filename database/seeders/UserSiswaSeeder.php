<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaData = [
            ['ABU BAKAR TSABIT GHUFRON', '20388'],
            ['ADE RAFIF DANESWARA', '20389'],
            ['ADE ZAIDAN ALTHAF', '20390'],
            ['ADHWA KHALILA RAMADHANI', '20391'],
            ['ADNAN FARIS', '20392'],
            ['AHMAD HANAFFI RAMADHANI', '20393'],
            ['AKBAR ADHA KUSUMAWARDHANA', '20394'],
            ['ANDHIKA AUGUST FARNAZ', '20395'],
            ['ANGELINA THITHIS SEKAR LANGIT', '20396'],
            ['ARIFIN NUR IHSAN', '20397'],
            ['ARYA EKA RAHMAT PRASETYO', '20398'],
            ['ATHIYYA HANIIFA', '20399'],
            ['AULIA MAHARANI', '20400'],
            ['BIJAK PUTRA FIRMANSYAH', '20401'],
            ['CHRISTIAN JAROT FERDIANNDARU', '20402'],
            ['DAFFA ARYA SETA', '20403'],
            ['DIMAS BAGUS AHMAD NURYASIN', '20404'],
            ['EKALAYA KEMAL', '20405'],
            ['FADLY ATHALLA FAWWAZ', '20406'],
            ['FARADILLA SYIFA NUR’AINI', '20407'],
            ['FARCHA AMALIA NUGRAHAINI', '20408'],
            ['FAUZAN ADZIMA KURNIAWAN', '20409'],
            ['GABRIEL POSSENTI GENTA BAHANA NAGARI', '20410'],
            ['GILANG NURHUDA', '20411'],
            ['GISELO KRISTIYANTO', '20412'],
            ['INTAN LUVIA HISANAH', '20414'],
            ['ISNAINI NUR WAHYUNINGSIH', '20415'],
            ['IZZUDDIN FAYYEDH HAQ', '20416'],
            ['JARDELLA ANGGUN LAVATEKTONIA', '20417'],
            ['JECONIA VALE ADYATMA', '20418'],
            ['KAYSA AQILA AMTA', '20419'],
            ['KEVIN ANDREA GERALDINO', '20420'],
            ['LAURENTIUS ANTARA', '20421'],
            ['MARCELLINUS PRADIPTA', '20422'],
            ['MEIDINNA TIARA PRAMUDHITA', '20423'],
            ['MEYLANI TRINURDIAH', '20424'],
            ['MUH. BENI ABDULLOH', '20425'],
            ['FAIRUZIZUAN AZZURI', '20427'],
            ['MUHAMMAD NAQSYABAND EFFENDI', '20428'],
            ['MUHAMMAD RAFI ANSHORY', '20429'],
            ['MUHAMMAD RAFLI QAIDUL NADHIF', '20430'],
            ['NABILA NUR AZIZAH', '20432'],
            ['NAFISYA RHEA PRAYASTI', '20433'],
            ['NAUFELIRNA RAMADHANI', '20434'],
            ['NAUVAL AT THARIQ', '20435'],
            ['NUR CHESYA PUSPITASARI', '20437'],
            ['NUR RAHMAN RIFAI', '20438'],
            ['NUR RAMADHANI SAPUTRA', '20439'],
            ['NUR RIJALUL ANNAM', '20440'],
            ['PEMBAYUN MAYA RIYANI', '20441'],
            ['RAFA ALI KHOMAINI', '20443'],
            ['RAFA ANAN WARDANA', '20444'],
            ['REYQAL KHAIRULLAH RINDUWAN', '20445'],
            ['RIENTANIA WAFANISA SARWADITA', '20447'],
            ['ROBERTHO DARRELL', '20449'],
            ['SABIAN RAKA PRAMUDITYA', '20450'],
            ['SALWA AZ-ZAHRA MIZAR', '20451'],
            ['SHAFWAN ILHAM DZAKY', '20452'],
            ['SURYA ANDHIKA PUTRI', '20453'],
            ['TSABITA IRENE ADIELIA', '20455'],
            ['VINCENTIUS REYNARA EZRATAMA', '20456'],
            ['YOHANES FAREL KRISTIAWAN', '20457'],
            ['YUMNA PUTRI NURJANAH', '20458'],
            ['ZULAYKHA WARDHANI', '20459'],
        ];

        // Buat role siswa jika belum ada
        Role::firstOrCreate(['name' => 'siswa']);

        foreach ($siswaData as [$name, $nis]) {
            $email = "{$nis}@sija.com";

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password'),
                ]
            );

            $user->assignRole('Siswa');
        }
    }
}
