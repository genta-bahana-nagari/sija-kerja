<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-white dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 font-sans antialiased">
        {{-- Navbar --}}
        <header class="w-full py-4 px-6 lg:px-12 flex justify-between items-center shadow-md bg-white dark:bg-[#121212] sticky top-0 z-50">
            <div class="text-xl font-bold text-blue-600">SIJA KERJA</div>
            <nav class="space-x-4 text-sm">
                <a href="#fitur" class="hover:text-blue-600 transition">Fitur</a>
                <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                        class="inline-block text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-sm transition">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                            class="inline-block text-gray-700 dark:text-gray-300 hover:text-blue-600 text-sm transition">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </nav>
        </header>

        {{-- Hero Section --}}
        <section class="w-full py-20 px-6 lg:px-12 text-center bg-gray-50 dark:bg-[#101010]">
            <h1 class="text-4xl lg:text-5xl font-extrabold mb-4 leading-tight">
                Selamat datang di <span class="text-blue-600">SIJA KERJA</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-xl mx-auto mb-8">
                Platform digital untuk mengelola dan memonitor kegiatan Praktik Kerja Lapangan siswa jurusan Sistem Informasi Jaringan dan Aplikasi.
            </p>
            @guest
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ route('login') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded text-sm shadow transition">
                        Masuk Sekarang
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                        class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-6 py-2 rounded text-sm transition">
                            Daftar Akun
                        </a>
                    @endif
                </div>
            @endguest
        </section>

        {{-- Fitur Section --}}
        <section id="fitur" class="py-20 px-6 lg:px-12 bg-white dark:bg-[#181818] text-center">
            <h2 class="text-3xl font-bold mb-12">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto text-center">
                <div class="p-6 border rounded-lg dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-2">Monitoring Siswa</h3>
                    <p class="text-gray-600 dark:text-gray-400">Lihat dan pantau aktivitas PKL siswa secara real-time oleh guru dan pembimbing industri.</p>
                </div>
                <div class="p-6 border rounded-lg dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-2">Pelaporan Otomatis</h3>
                    <p class="text-gray-600 dark:text-gray-400">Buat laporan mingguan dan bulanan secara otomatis berdasarkan data yang dikumpulkan.</p>
                </div>
                <div class="p-6 border rounded-lg dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-2">Notifikasi & Reminder</h3>
                    <p class="text-gray-600 dark:text-gray-400">Sistem notifikasi tugas, laporan, dan tenggat waktu langsung ke akun pengguna.</p>
                </div>
            </div>
        </section>

        {{-- Tentang Section --}}
        <section id="tentang" class="py-20 px-6 lg:px-12 bg-gray-50 dark:bg-[#101010]">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Tentang SIJA KERJA</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                    Aplikasi ini dikembangkan untuk mendukung proses PKL siswa jurusan SIJA (Sistem Informasi Jaringan dan Aplikasi) agar lebih efisien, terstruktur, dan terdokumentasi dengan baik.
                    Guru pembimbing, industri, dan siswa dapat berkolaborasi secara digital dalam satu platform yang aman dan mudah digunakan.
                </p>
            </div>
        </section>

        {{-- CTA Ulang --}}
        <section class="py-16 px-6 lg:px-12 bg-blue-600 text-white text-center">
            <h2 class="text-2xl lg:text-3xl font-bold mb-4">Siap Kelola PKL Secara Digital?</h2>
            <p class="mb-6 text-sm">Masuk sekarang atau daftar akun baru untuk memulai pengalaman PKL yang lebih modern.</p>
            @guest
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-6 py-2 rounded shadow font-medium hover:bg-gray-100 transition">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="border border-white px-6 py-2 rounded hover:bg-white hover:text-blue-600 transition">
                            Daftar
                        </a>
                    @endif
                </div>
            @endguest
        </section>

        {{-- Footer --}}
        <footer id="kontak" class="py-6 text-center text-xs text-gray-500 dark:text-gray-400 bg-white dark:bg-[#0a0a0a]">
            &copy; {{ date('Y') }} Aplikasi PKL SIJA · Dikembangkan oleh Jurusan SIJA SMK · All rights reserved.
        </footer>
    </body>
</html>