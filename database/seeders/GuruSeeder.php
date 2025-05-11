<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guruData = [
            ['Sugiarto'],
            ['Yunianto Hermawan'],
            ['Margaretha Endah Titisari'],
            ['Eka Nur Ahmad Romadhoni'],
            ['Rr. Retna Trimantaraningsih'],
            ['Ratna Yunitasari'],
        ];

        // Buat role siswa jika belum ada
        Role::firstOrCreate(['name' => 'guru']);

        foreach ($guruData as $index => [$name]) {
            $email = "guru{$index}@sija.com"; // email unik untuk setiap guru

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password'),
                ]
            );

            $user->assignRole('guru');
        }
    }
}
