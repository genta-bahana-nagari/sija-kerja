<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Guru', 'Siswa'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Tambah user guru
        $guruUser = User::create([
            'name' => 'Sugiarto',
            'email' => 'sugiarto@sija.com',
            'password' => bcrypt('password'),
        ]);
        $guruUser->assignRole('Guru');

        Guru::create([
            'nama' => 'Sugiarto',
            'nip' => '1987654321',
            'gender' => 'L',
            'alamat' => 'Jl. Pendidikan No. 12',
            'kontak' => '08123456789',
            'email' => 'sugiarto@sija.com',
        ]);

        // Tambah user siswa
        $siswaUser = User::create([
            'name' => 'Gabriel Possenti Genta',
            'email' => '20410@sija.com',
            'password' => bcrypt('password'),
        ]);
        $siswaUser->assignRole('Siswa');

        Siswa::create([
            'nama' => 'Gabriel Possenti Genta',
            'nis' => '20410',
            'gender' => 'L',
            'alamat' => 'Jl. Teknologi No. 7',
            'kontak' => '08987654321',
            'email' => '20410@sija.com',
            'status_pkl' => 'no',
        ]);
    }
}
