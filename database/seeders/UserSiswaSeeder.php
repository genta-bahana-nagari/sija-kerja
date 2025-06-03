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
            ['Abu Bakar Tsabit Ghufron', '20388'],
            ['Ade Rafif Daneswara', '20389'],
            ['Ade Zaidan Althaf', '20390'],
            ['Adhwa Khalila Ramadhani', '20391'],
            ['Adnan Faris', '20392'],
            ['Ahmad Hanaffi Ramadhani', '20393'],
            ['Akbar Ad\'ha Kusumawardhana', '20394'],
            ['Andhika August Farnaz', '20395'],
            ['Angelina Thithis Sekar Langit', '20396'],
            ['Arifin Nur Ihsan', '20397'],
            ['Arya Eka Rahmat Prasetyo', '20398'],
            ['Athiyya Haniifa', '20399'],
            ['Aulia Maharani', '20400'],
            ['Bijak Putra Firmansyah', '20401'],
            ['Christian Jarot Ferdianndaru', '20402'],
            ['Daffa Arya Seta', '20403'],
            ['Dimas Bagus Ahmad Nuryasin', '20404'],
            ['Ekalaya Kemal Pasha', '20405'],
            ['Fadly Athalla Fawwaz', '20406'],
            ['Faradilla Syifa Nuraini', '20407'],
            ['Farcha Amalia Nugrahaini', '20408'],
            ['Fauzan Adzima Kurniawan', '20409'],
            ['Gabriel Possenti Genta Bahana Nagari', '20410'],
            ['Gilang Nurhuda', '20411'],
            ['Giselo Kristiyanto', '20412'],
            ['Ilham Putra Mahendra', '20413'],
            ['Intan Luvia Hisanah', '20414'],
            ['Isnaini Nur Wahyuningsih', '20415'],
            ['Izzuddin Fayyedh Haq', '20416'],
            ['Jardella Anggun Lavatektonia', '20417'],
            ['Jeconia Vale Adyatma', '20418'],
            ['Kaysa Aqila Amta', '20419'],
            ['Kevin Andrea Geraldino', '20420'],
            ['Laurentius Daviano Maximus Antara', '20421'],
            ['Marcellinus Christo Pradipta', '20422'],
            ['Meidinna Tiara Pramudhita', '20423'],
            ['Meylani Tri Nur Diah', '20424'],
            ['Muh. Beni Abdullah', '20425'],
            ['Muhammad Akbar Amaanullaah', '20426'],
            ['Muhammad Fairuzizuan Azzuri', '20427'],
            ['Muhammad Naqsyaband Effendi', '20428'],
            ['Muhammad Rafi Anshory', '20429'],
            ['Muhammad Rafli Qaidul Nadhif', '20430'],
            ['Mutiara Sekar Kinasih', '20431'],
            ['Nabila Nur Azizah', '20432'],
            ['Nafisya Rhea Prayasti', '20433'],
            ['Naufelirna Subkhi Ramadhani', '20434'],
            ['Nauval At-Thariq', '20435'],
            ['Noveryan Putra Pamungkas', '20436'],
            ['Nur Chesya Puspitasari', '20437'],
            ['Nur Rahman Rifai', '20438'],
            ['Nur Ramadhani Saputra', '20439'],
            ['Nur Rijalul Annam', '20440'],
            ['Pembayun Maya Riyani', '20441'],
            ['Raden Satria Aji Pamungkas', '20442'],
            ['Rafa Ali Khomaini', '20443'],
            ['Rafa Anan Wardana', '20444'],
            ['Reyqal Khairullah Rinduwan', '20445'],
            ['Reza Farkih', '20446'],
            ['Rientania Wafanisa Sarwadita', '20447'],
            ['Rosyidah Muthmainnah', '20448'],
            ['Robertho Darrell', '20449'],
            ['Sabian Raka Pramuditya', '20450'],
            ['Salwa Az-Zahra Mizar', '20451'],
            ['Shafwan Ilham Dzaky', '20452'],
            ['Surya Andhika Putri', '20453'],
            ['Thara Bunga Novriyansyah', '20454'],
            ['Tsabita Irene Adielia', '20455'],
            ['Vincentius Reynara Ezratama', '20456'],
            ['Yohanes Farel Kristiawan', '20457'],
            ['Yumna Putri Nurjanah', '20458'],
            ['Zulaykha Kusuma Wardhani', '20459'],
        ];

        // Buat role siswa jika belum ada
        Role::firstOrCreate(['name' => 'Siswa']);

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
