# Aplikasi PKL - Manajemen Praktik Kerja Lapangan

Aplikasi ini dibangun menggunakan Laravel 12, Livewire Starterkits, dan Filament untuk membantu manajemen data Praktik Kerja Lapangan (PKL) di lingkungan sekolah atau kampus. Fitur utama termasuk pengelolaan data siswa, pembimbing, instansi, dan laporan PKL, serta sistem otorisasi berbasis peran menggunakan Filament Shield.

## Fitur Utama

- Manajemen data siswa peserta PKL
- Manajemen instansi/perusahaan tempat PKL
- Monitoring status PKL siswa (sudah diterima PKL atau belum diterima)
- Role-based access control (RBAC) dengan **Filament Shield**
- Antarmuka admin berbasis Filament Admin Panel
- Restful API untuk managemen data tanpa frontend atau dengan frontend terpisah. Cek file routes/web.php

## Teknologi yang Digunakan

- [Laravel](https://laravel.com/) 12
- [Livewire](https://laravel-livewire.com)
- [Filament](https://filamentphp.com/) 3
- [Filament Shield](https://github.com/ryangjchandler/filament-shield)
## Instalasi

Livewire Starterkit menggunakan NodeJS untuk development. Jadi perhatikan ya... :)

1. Clone repositori:

```bash
git clone -b main --single-branch https://github.com/genta-bahana-nagari/project_pkl_fullstack.git
cd project_pkl_fullstack
```
Clone yang branch  main --> sudah teruji.

2. Install dependensi:
```bash
composer install
npm install
```

3. Copy file environment dan konfigurasi:
```bash
cp .env.example .env
php artisan key:generate
```

4. Install dan konfigurasi Filament Shield:
```bash
php artisan shield:install
php artisan shield:generate
```

5. Jalankan server lokal:
```bash
php artisan serve
npm run dev
```

6. Jika ingin deploy, build dulu:
```bash
npm run build
```
## Role dan Hak Akses

Filament Shield digunakan untuk mengelola peran seperti:

- Admin: Akses penuh ke seluruh modul
- Guru: Akses view ke data siswa yang dibimbing, industri, dan update data dirinya sendiri
- Siswa: Input data diri, menambah data industri, dan update status PKL.

Gunakan perintah berikut untuk mengelola peran dan izin:
```bash
php artisan shield:generate
php artisan shield:super-admin
```

## Contributing

Kontribusi selalu diterima! Boleh fork dan pull request, atau lebih aman git clone dulu, kembangkan di local :).
## License

Project ini memiliki lisensi
[MIT](https://choosealicense.com/licenses/mit/).

