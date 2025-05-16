<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
    <!-- Gambar -->
    <div class="px-4 mb-6 flex justify-center items-center">
        <img src="{{ asset('storage/'.$industri->foto) }}" class="w-full object-cover rounded" alt="{{ $industri->foto }}">
    </div>

    <!-- Informasi Industri -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nama -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Nama</h3>
            <p class="text-gray-700 mt-2 break-words">{{ $industri->nama }}</p>
        </div>

        <!-- Bidang Usaha -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Bidang Usaha</h3>
            <p class="text-gray-700 mt-2 break-words">{{ $industri->bidang_usaha }}</p>
        </div>

        <!-- Alamat (1 kolom penuh) -->
        <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Alamat</h3>
            <p class="text-gray-700 mt-2 break-words">{{ $industri->alamat }}</p>
        </div>

        <!-- Kontak -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Kontak</h3>
            <p class="text-gray-700 mt-2 break-words">{{ $industri->kontak }}</p>
        </div>

        <!-- Email -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Email</h3>
            <p class="text-gray-700 mt-2 break-words">{{ $industri->email }}</p>
        </div>

        <!-- Guru Pembimbing -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Guru Pembimbing</h3>
            <p class="text-gray-700 mt-2 break-words">
                {{ $industri->guru ? $industri->guru->nama : 'Tidak ada guru' }}
            </p>
        </div>

        <!-- Website -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800">Website Industri</h3>
            <a href="{{ $industri->website }}"
               class="text-blue-600 hover:underline break-words"
               target="_blank" rel="noopener noreferrer">
                {{ $industri->website }}
            </a>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-6">
        <a href="{{ route('industri') }}"
           class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
            Kembali
        </a>
    </div>
</div>
