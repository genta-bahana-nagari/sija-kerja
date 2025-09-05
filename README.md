# 📚 SIJA Kerja - Manajemen PKL

Aplikasi web yang dibangun menggunakan **Laravel 12**, **Livewire Starter Kit**, dan **Filament** untuk mengelola data Praktik Kerja Lapangan (PKL) di lingkungan sekolah atau universitas. Aplikasi ini memudahkan pengelolaan data siswa, pembimbing, instansi/perusahaan, serta status dan laporan PKL, lengkap dengan sistem **role-based access control** menggunakan **Filament Shield**.

---

## 🔧 Fitur Utama

- 🧑‍🎓 Manajemen data PKL siswa  
- 🏢 Manajemen data instansi/perusahaan  
- 📊 Monitoring status PKL siswa (diterima/menunggu)  
- 🔐 Hak akses berdasarkan peran menggunakan **Filament Shield**  
- 🧩 Admin panel menggunakan **Filament Admin Panel**  
- ⚙️ Tersedia Restful API via route `routes/api.php` (contoh sudah disediakan)  

---

## 🛠️ Teknologi yang Digunakan

- [Laravel 12](https://laravel.com/)  
- [Livewire](https://laravel-livewire.com) ==> Starterkit. Untuk instalasi project starterkit bisa [dilihat disini](https://qadrlabs.com/post/laravel-12-starter-kit)
- [Filament 3](https://filamentphp.com/)  
- [Filament Shield](https://github.com/ryangjchandler/filament-shield)  

---

## ⚙️ Instalasi

1. **Clone repository:**
   ```bash
   git clone https://github.com/genta-bahana-nagari/sija-kerja.git
   cd sija-kerja
   ```
   > Branch `main` sudah stabil dan teruji.

2. **Install dependensi Laravel dan Livewire:**
   ```bash
   composer install
   npm install
   ```

3. **Copy file environment & generate key:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi database & seed:**
   ```bash
   php artisan migrate --seed
   ```

5. **Buat user Filament (admin):**
   ```bash
   php artisan make:filament-user
   ```

6. **Install Filament Shield & generate hak akses:**
   ```bash
   php artisan shield:generate
   php artisan shield:super-admin --panel
   ```

7. **Jalankan server lokal:**
   ```bash
   composer run dev
   ```

---

## 🔐 Peran & Hak Akses

Manajemen peran dan akses menggunakan **Filament Shield**, dengan struktur peran seperti berikut:

- **Admin/Super Admin:** akses penuh ke modul admin (CRUD user, siswa, perusahaan, dll)  
- **Guru Pembimbing:** akses monitoring siswa PKL  
- **Siswa:** akses ke frontend (jika dikembangkan) untuk input/melihat status  

Perintah untuk pengelolaan peran:
```bash
   php artisan shield:generate
   php artisan shield:super-admin --panel
```

---

## 📂 Struktur Proyek

```
📁 app/
│
├── Filament/Resources/
│   └── SiswaResource
│   └── GuruResource
│   └── IndustriResource
│   └── PKLResource
│
├── Http/Controllers/Api
│   └──AuthController.php
│   └──GuruController.php
│   └──IndustriController.php
│   └──PKLController.php
│   └──SiswaController.php
│    
├── Livewire/
│   └── Siswa
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Guru
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Industri
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Pkl
│       └──Form.php
│       └──Index.php
│       └──View.php
│
├── Models/
│   └── Siswa.php
│   └── Guru.php
│   └── Industri.php
│   └── PKL.php
│
📁 database/
├── migrations/
├── seeders/
│
📁 resources/view/livewire
│   │
│   └── guru
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── industri
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── pkl
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── siswa
│       └──form.blade.php
│       └──index.blade.php
│       └──view.blade.php
│
📁 routes/
└── web.php
└── api.php
```

---

## 🤝 Kontribusi

Kontribusi sangat dipersilakan!  
Silakan fork repo ini, buat branch baru, dan ajukan pull request.  
Atau clone secara lokal untuk eksperimen dan pengembangan.

---

## 👤 Author

- **Genta Bahana Nagari**  
  [LinkedIn](https://www.linkedin.com/in/genta-bahana-nagari/) | [GitHub](https://github.com/genta-bahana-nagari)

---

## 🌟 Dukung Proyek Ini

Jika kamu merasa proyek ini bermanfaat, jangan ragu untuk beri ⭐ di GitHub dan bagikan ke teman-temanmu!

---

## 📜 Lisensi

Proyek ini dirilis di bawah lisensi **MIT License**. Silakan gunakan dan modifikasi sesuai kebutuhan.  
Lihat detailnya di file [LICENSE](LICENSE).

---
