<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-6">
        
        <!-- Pengenalan Aplikasi -->
        <div class="bg-blue-100 text-blue-800 p-4 rounded-xl shadow-md dark:bg-blue-900 dark:text-white">
            <h2 class="text-xl font-semibold text-center">Selamat datang di Dashboard SIJA Kerja</h2>
            @if(auth()->check() && auth()->user()->hasRole('Siswa') && !auth()->user()->siswa)
            <p class="mt-2 text-sm">
                Aplikasi ini bertujuan untuk mempermudah pengelolaan penempatan Praktek Kerja Lapangan (PKL) bagi siswa dan guru pembimbing.
                Kamu sebagai siswa dapat melengkapi data diri, menamabah industri sesuai minat kamu, dan melaporkan status penerimaaan PKLmu.
            </p>
            @else
            <p class="mt-2 text-sm">
                Aplikasi ini bertujuan untuk mempermudah pengelolaan penempatan Praktek Kerja Lapangan (PKL) bagi siswa dan guru pembimbing.
                Anda sebagai guru dapat memantau status PKL siswa, memantau data <i>real time</i>, serta berinteraksi dengan mitra industri.
            </p>
            @endif
        </div>

        <!-- Peringatan atau Informasi Penting -->
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-xl shadow-md dark:bg-yellow-800 dark:text-white">
            <h2 class="text-xl font-semibold text-center">Peringatan!</h2>
            <p class="mt-2 text-sm">
                Pastikan data yang diinputkan lengkap dan akurat agar proses penempatan PKL berjalan dengan lancar.
                Periksa kembali data yang telah Anda masukkan sebelum menyimpan atau mengirimkan permohonan PKL.
            </p>
        </div>

        <!-- Langkah-Langkah Penggunaan Aplikasi -->
        <div class="bg-green-100 text-green-800 p-4 rounded-xl shadow-md dark:bg-green-800 dark:text-white">
            <h2 class="text-xl font-semibold text-center">Langkah-Langkah Penggunaan Aplikasi</h2>
            <ul class="mt-2 text-sm list-inside">
                <li>1. Ganti email pada profil Anda dengan <b>email asli!</b> Karena akan memengaruhi proses administrasi.</li>
                @if(auth()->check() && auth()->user()->hasRole('Siswa'))
                    <li>2. Lengkapi data siswa dan pilih tempat PKL yang sesuai.</li>
                @else
                    <li>2. Lengkapi data guru pada halaman yang tersedia.</li>
                @endif
                <li>3. Periksa status PKL dan pastikan semua informasi valid.</li>
                <li>4. Pilih tombol "Simpan" untuk mengajukan penempatan PKL.</li>
                <li>5. Guru pembimbing dapat memantau dan status siswa langsung di dashboard.</li>
                <li>6. Cek laporan perkembangan siswa di bagian laporan.</li>
            </ul>
        </div>

        <!-- Tips IDK -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow-md flex flex-col justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-700 dark:text-white mb-2">Tips Cepat</h2>
                <ul class="text-sm text-gray-600 dark:text-gray-300 space-y-1">
                    <li>✅ Gunakan laptop/PC untuk tampilan terbaik.</li>
                    <li>📧 Periksa email secara berkala untuk notifikasi PKL.</li>
                    <li>📄 Siapkan dokumen seperti CV jika dibutuhkan industri.</li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>
