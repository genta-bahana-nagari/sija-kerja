<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIJA Kerja - Penempatan PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-white text-gray-800 dark:bg-[#121212] dark:text-gray-100">

    <!-- Navbar -->
    <header class="w-full py-4 px-6 lg:px-12 flex justify-between items-center shadow-sm bg-white/80 dark:bg-[#121212]/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 dark:border-gray-800">
        <!-- Logo -->
        <div class="text-xl font-bold text-blue-600 dark:text-blue-400">SIJA KERJA</div>

        <!-- Navigasi Utama -->
        <nav class="hidden md:flex items-center space-x-6 text-sm text-gray-700 dark:text-gray-200">
            <a href="#fitur" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Fitur</a>
            <a href="#mengapa" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Mengapa Kami</a>
            <a href="#cara" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Cara Kerja</a>
            <a href="#mitra" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Mitra</a>
            <a href="#testimoni" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Testimoni</a>
            <a href="#kontak" class="hover:text-blue-600 dark:hover:text-blue-400 transition duration-200 font-medium">Kontak</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition shadow">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-sm transition">
                        Masuk
                    </a>
                @endauth
            @endif
        </nav>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-50 via-white to-blue-100 py-24 dark:from-blue-900 dark:via-gray-900 dark:to-blue-950">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white mb-6">Solusi Cerdas Penempatan PKL Siswa</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">Temukan dan kelola tempat magang dengan mudah menggunakan <strong>SIJA Kerja</strong>, platform digital terpercaya untuk siswa dan guru pembimbing.</p>
                <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">Mulai Sekarang</a>
            </div>
            <div class="hidden md:block">
                <img src="https://illustrations.popsy.co/gray/work-from-home.svg" alt="Ilustrasi PKL" class="w-full h-auto" />
            </div>
        </div>
    </section>

    <!-- Pengenalan Aplikasi -->
    <section class="relative py-24 bg-gradient-to-br from-blue-100 via-white to-blue-50 dark:from-gray-900 dark:via-[#121212] dark:to-blue-950">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Gambar Ilustrasi -->
            <div class="order-2 md:order-1">
                <img src="https://insight.study.csu.edu.au/wp-content/uploads/2020/02/banner-10-IT-jobs-option3.jpg" alt="Ilustrasi Pengenalan Aplikasi" class="w-full h-auto rounded-md shadow-lg">
            </div>

            <!-- Konten Teks -->
            <div class="order-1 md:order-2">
                <h3 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 dark:text-white">
                    Apa Itu <span class="text-blue-600 dark:text-blue-400">SIJA Kerja</span>?
                </h3>
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                    <strong>SIJA Kerja</strong> adalah platform digital yang dirancang khusus untuk mempermudah proses penempatan <em>Praktek Kerja Lapangan (PKL)</em> bagi siswa SMK, guru pembimbing, dan mitra industri.
                </p>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-400 mb-6">
                    <li>Terhubung langsung dengan banyak mitra industri nasional</li>
                    <li>Dashboard intuitif untuk pemantauan dan pengajuan PKL</li>
                    <li>Efisiensi komunikasi antara siswa, guru, dan perusahaan</li>
                </ul>
                <a href="#fitur" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                    Jelajahi Fitur Kami
                </a>
            </div>
        </div>
    </section>


    <!-- Fitur -->
    <section id="fitur" class="py-20 bg-white dark:bg-[#1a1a1a]">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-12 text-gray-800 dark:text-white">Fitur Unggulan</h3>
            <div class="grid md:grid-cols-3 gap-12">
                @foreach([
                    ['img' => 'task.png', 'title' => 'Manajemen PKL', 'desc' => 'Pengajuan, persetujuan, dan pelaporan PKL semua dalam satu platform.'],
                    ['img' => 'data-report.png', 'title' => 'Laporan Otomatis', 'desc' => 'Laporan harian dan akhir magang dibuat secara otomatis dan rapi.'],
                    ['img' => 'support.png', 'title' => 'Komunikasi Real-time', 'desc' => 'Diskusi langsung dengan pembimbing dan mitra industri secara online.'],
                ] as $fitur)
                <div class="p-6 border rounded-lg hover:shadow-lg transition dark:border-gray-700">
                    <img src="https://img.icons8.com/fluency/96/{{ $fitur['img'] }}" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">{{ $fitur['title'] }}</h4>
                    <p class="text-gray-600 dark:text-gray-300">{{ $fitur['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mengapa Kami -->
    <section id="mengapa" class="bg-blue-50 dark:bg-[#0f172a] py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-10 text-gray-800 dark:text-white">Mengapa Memilih SIJA Kerja?</h3>
            <div class="grid md:grid-cols-4 gap-8 text-left">
                @foreach([
                    ['title' => '✅ Terintegrasi', 'desc' => 'Semua proses PKL dari awal hingga akhir berada dalam satu platform.'],
                    ['title' => '🔒 Aman', 'desc' => 'Data siswa, guru, dan mitra dilindungi dengan keamanan modern.'],
                    ['title' => '📊 Monitoring', 'desc' => 'Pantau aktivitas dan kemajuan siswa secara real-time dan akurat.'],
                    ['title' => '📱 Responsif', 'desc' => 'Akses dari perangkat apapun: desktop, tablet, hingga ponsel.']
                ] as $item)
                <div>
                    <h4 class="text-xl font-semibold mb-2 text-blue-700 dark:text-blue-300">{{ $item['title'] }}</h4>
                    <p class="text-gray-600 dark:text-gray-300">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cara Kerja -->
    <section id="cara" class="py-20 bg-white dark:bg-[#1a1a1a]">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">Bagaimana Cara Kerja SIJA Kerja?</h3>
            <div class="grid md:grid-cols-4 gap-8 text-center">
                @foreach([
                    'Autentikasi Siswa' => 'Siswa login, melengkapi profil, dan minat industri.',
                    'Pilih Tempat PKL' => 'Pilih instansi mitra sesuai jurusan dan lokasi.',
                    'Update Status' => 'Siswa update status PKL setelah diterima seleksi.',
                    'Pantauan Guru' => 'Guru memonitor data siswa termasuk status PKL.',
                ] as $title => $desc)
                <div>
                    <div class="text-blue-600 text-4xl font-bold mb-2">{{ $loop->iteration }}</div>
                    <h4 class="font-semibold text-lg mb-2 text-gray-800 dark:text-white">{{ $title }}</h4>
                    <p class="text-gray-600 dark:text-gray-300">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mitra -->
    <section id="mitra" class="bg-blue-50 dark:bg-[#0f172a] py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-10 text-gray-800 dark:text-white">Instansi Mitra Kami</h3>
            <div class="swiper mitra-swiper">
                <div class="swiper-wrapper">
                    @foreach([
                    'https://vritimes-public.s3.ap-southeast-1.amazonaws.com/production/beef9bfc3116846aa96ebf96542f5a73f4aedcd51bc799f5ce67fb3d9c33823b/logoGT_HiResReg_Color.jpg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcrlVzJdwpwbGL1wWwC3Nm-LxlSm_TY6x27w&s',
                    'https://perusahaanjepang.com/wp-content/uploads/2015/08/25-KARYA-HIDUP-SENTOSA-CV-logo-copy.png',
                    'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/mlogo/CIB-60031-e722c623-dd04-4d8c-8263-8b5434862336.png',
                    'https://cargloss.co.id/wp-content/uploads/2023/04/logo-cargloss.png',
                    'https://ugc.production.linktr.ee/0fecabbe-2df2-4021-9581-b10a54002655_Logo-1x1.jpeg?io=true&size=avatar-v3_0',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWo4fp52jZqRGzYg9TCPHi1mlFCvwsa653xw&s',
                    'https://i0.wp.com/weshare.or.id/wp-content/uploads/2020/10/divistant-logo.png?fit=510%2C510&ssl=1',

                    ] as $logo)
                    <div class="swiper-slide flex justify-center items-center">
                        <div class="w-32 h-20 bg-white rounded flex justify-center items-center shadow">
                            <img src="{{ $logo }}" alt="Logo Mitra" class="max-h-16 object-contain" />
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section id="testimoni" class="bg-white dark:bg-[#1a1a1a] py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-10 text-gray-800 dark:text-white">Apa Kata Mereka</h3>
            <div class="swiper testimoni-swiper">
                <div class="swiper-wrapper">
                    @foreach([
                        ['"SIJA Kerja sangat membantu proses pencarian tempat PKL yang sesuai dengan passion saya!"', 'Genta, Siswa SMK SIJA'],
                        ['"Saya bisa memantau semua siswa bimbingan saya dalam satu dashboard. Sangat efisien."', 'Pak Ugik, Guru Pembimbing'],
                        ['"Awalnya bingung mau PKL dimana. Berkat SIJA Kerja, saya bisa menemukan tempat yang cocok!"', 'Ilham, Siswa SMK SIJA'],
                        ['"Dengan SIJA Kerja, proses pengawasan siswa jadi lebih mudah dan terstruktur."', 'Bu Rere, Guru Pembimbing'],
                        ['"Platform ini membantu saya menemukan tempat PKL sesuai dengan minat karier saya."', 'Athiyya, Siswa SMK SIJA'],
                        ['"SIJA Kerja memberi kemudahan dalam mengelola dan memantau progres siswa PKL."', 'Bu Endah, Guru Pembimbing'],
                        ['"Saya jadi lebih percaya diri saat melamar tempat PKL karena ada panduan lengkap di SIJA Kerja."', 'Arifin, Siswa SMK SIJA'],
                        ['"Sangat terbantu dengan notifikasi dan sistem evaluasi otomatis di SIJA Kerja."', 'Pak Eka, Guru Pembimbing'],
                        ['"Pengalaman mencari PKL tidak lagi menegangkan berkat fitur-fitur SIJA Kerja."', 'Salwa, Siswa SMK SIJA'],
                        ['"Data siswa mudah diakses dan dilaporkan. Sangat membantu tugas administrasi kami."', 'Bu Ratna, Guru Pembimbing']
                    ] as [$msg, $author])
                    <div class="swiper-slide">
                        <div class="bg-blue-50 dark:bg-gray-800 p-6 rounded shadow hover:shadow-lg transition h-full">
                            <p class="italic text-gray-700 dark:text-gray-300">{{ $msg }}</p>
                            <h5 class="mt-4 font-semibold text-blue-600 dark:text-blue-400">– {{ $author }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="bg-blue-600 text-white py-20">
        <div class="max-w-5xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12">Hubungi Kami</h3>
            <div class="grid md:grid-cols-2 gap-10 text-white text-base">
                
                <div class="flex items-start space-x-4">
                    <div>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8h18"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">Email</p>
                        <p>kontak@sijakerja.id</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5h2l.4 2M7 13h10l1.2-6H6.2M16 16a2 2 0 11-4 0 2 2 0 014 0zm-6 0a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">Telepon</p>
                        <p>+62 812 3456 7890</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5V4H2v16h5m10 0v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">Alamat</p>
                        <p>Jl. Teknologi No. 45, Jakarta, Indonesia</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div>
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.36 6.64a9 9 0 010 12.72M15.54 9.46a5 5 0 010 7.07M12.73 12.27a1 1 0 01-1.46 0L9 10M21 21l-6-6"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">Media Sosial</p>
                        <p>
                            <a href="https://instagram.com/sijakerja" target="_blank" class="underline hover:text-gray-200">@sijakerja</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} SIJA Kerja. All rights reserved.</p>
            <div class="space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:underline">Kebijakan Privasi</a>
                <a href="#" class="hover:underline">Syarat & Ketentuan</a>
            </div>
        </div>
    </footer>


    <!-- SwiperJS JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    new Swiper('.mitra-swiper', {
        loop: true,
        autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        },
        slidesPerView: 2,
        spaceBetween: 20,
        breakpoints: {
        640: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 5,
        },
        },
    });

    new Swiper('.testimoni-swiper', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
    </script>
</body>
</html>
