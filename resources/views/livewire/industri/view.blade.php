<div class="max-w-4xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 mt-10 text-gray-800 dark:text-gray-100">
    <!-- Foto Industri -->
    <div class="px-4 mb-6 flex justify-center items-center">
        <img src="{{ asset('storage/'.$industri->foto) }}"
             class="w-full md:w-2/3 object-cover rounded-lg border-4 border-gray-300 dark:border-gray-700"
             alt="{{ $industri->foto }}">
    </div>

    <!-- Informasi Industri (Grid) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nama -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Nama</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">{{ $industri->nama }}</p>
        </div>

        <!-- Bidang Usaha -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Bidang Usaha</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">{{ $industri->bidang_usaha }}</p>
        </div>

        <!-- Alamat (Full Width) -->
        <div class="md:col-span-2 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Alamat</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">{{ $industri->alamat }}</p>
        </div>

        <!-- Kontak -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Kontak</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">{{ $industri->kontak }}</p>
        </div>

        <!-- Email -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Email</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">{{ $industri->email }}</p>
        </div>

        <!-- Guru Pembimbing -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Guru Pembimbing</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2 break-words">
                {{ $industri->guru ? $industri->guru->nama : 'Tidak ada guru' }}
            </p>
        </div>

        <!-- Website -->
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">Website Industri</h3>
            <a href="{{ $industri->website }}"
               class="text-blue-600 dark:text-blue-400 hover:underline break-words"
               target="_blank" rel="noopener noreferrer">
                {{ $industri->website }}
            </a>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-6">
        <a href="{{ route('industri') }}"
           class="inline-block bg-gray-500 hover:bg-gray-600 dark:hover:bg-gray-700 text-white px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
            Kembali
        </a>
    </div>
</div>