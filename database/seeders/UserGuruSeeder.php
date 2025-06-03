<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruData = [
            ['nama' => 'Sugiarto', 'email' => 'ugik@sija.com'],
            ['nama' => 'Yunianto Hermawan', 'email' => 'yuni@sija.com'],
            ['nama' => 'Margaretha Endah Titisari', 'email' => 'endah@sija.com'],
            ['nama' => 'Eka Nur Ahmad Romadhoni', 'email' => 'eka@sija.com'],
            ['nama' => 'Rr. Retna Trimantaraningsih', 'email' => 'rere@sija.com'],
            ['nama' => 'Ratna Yunitasari', 'email' => 'ratna@sija.com'],
        ];

        // Buat role guru jika belum ada
        Role::firstOrCreate(['name' => 'Guru']);

        foreach ($guruData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['nama'],
                    'password' => Hash::make('password'), // ganti dengan password yang lebih aman di production
                ]
            );

            $user->assignRole('Guru');
        }
    }
}
