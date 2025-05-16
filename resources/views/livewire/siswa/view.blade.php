<div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 mt-10 text-gray-800 dark:text-gray-100">
    <!-- Foto -->
    <div class="px-4 mb-6 flex justify-center items-center">
        <img src="{{ asset('storage/'.$siswa->foto) }}"
             class="w-40 h-40 object-cover rounded-full border-4 border-gray-300 dark:border-gray-700"
             alt="{{ $siswa->foto }}">
    </div>

    <!-- Grid Info (Bento Style) -->
    <div class="grid grid-cols-6 grid-rows-4 gap-4">
        <!-- Nama -->
        <div class="col-span-3">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Nama</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $siswa->nama }}</p>
            </div>
        </div>

        <!-- NIS -->
        <div class="col-span-3 col-start-4">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">NIS</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $siswa->nis }}</p>
            </div>
        </div>

        <!-- Gender -->
        <div class="col-span-3 row-start-2">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Gender</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $this->ketGender($siswa->gender) }}</p>
            </div>
        </div>

        <!-- Alamat -->
        <div class="col-span-3 col-start-4 row-start-2">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Alamat</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $siswa->alamat }}</p>
            </div>
        </div>

        <!-- Kontak -->
        <div class="col-span-3 row-start-3">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Kontak</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $siswa->kontak }}</p>
            </div>
        </div>

        <!-- Email -->
        <div class="col-span-3 col-start-4 row-start-3">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Email</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $siswa->email }}</p>
            </div>
        </div>

        <!-- Status PKL -->
        <div class="col-span-6 row-start-4">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm text-center">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Status PKL</h3>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $this->ketStatusPKL($siswa->status_pkl) }}</p>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-6">
        <a href="{{ route('siswa') }}"
           class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
            Kembali
        </a>
    </div>
</div>
