<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
    <div class="px-4 mb-6 flex justify-center items-center">
        <img src="{{ asset('storage/'.$industri->foto) }}" class="w-full object-cover" alt="{{ $industri->foto }}">
    </div>
    <!-- Bento -->
    <div class="grid grid-cols-6 grid-rows-3 gap-4">
        <div class="col-span-3">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Nama</h3>
                <p class="text-gray-700 mt-2">{{ $industri->nama }}</p>
            </div>
        </div>
        <div class="col-span-3 col-start-4">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Bidang Usaha</h3>
                <p class="text-gray-700 mt-2">{{ $industri->bidang_usaha }}</p>
            </div>
        </div>
        <div class="col-span-3 col-start-1 row-start-2">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Alamat</h3>
                <p class="text-gray-700 mt-2">{{ $industri->alamat }}</p>
            </div>
        </div>
        <div class="col-span-3 row-start-2">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Kontak</h3>
                <p class="text-gray-700 mt-2">{{ $industri->kontak }}</p>
            </div>
        </div>
        <div class="col-span-3 col-start-1 row-start-3">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Email</h3>
                <p class="text-gray-700 mt-2">{{ $industri->email }}</p>
            </div>
        </div>
        <div class="col-span-3 col-start-4 row-start-3">
            <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                <h3 class="font-semibold text-lg text-gray-800">Guru Pembimbing</h3>
                <p class="text-gray-700 mt-2">{{ $industri->guru ? $industri->guru->nama : 'Tidak ada guru' }}</p>
            </div>
        </div>
    </div>

    <div class="px-4 mt-4 mb-6 bg-gray-50 p-4 rounded-lg shadow-sm">
        <div class="flex flex-col text-center">
            <h3 class="font-semibold text-lg text-gray-800 mb-1">Website Industri</h3>
            <a href="{{ $industri->website }}" class="text-gray-600 hover:underline break-words" target="_blank" rel="noopener noreferrer">
                {{ $industri->website }}
            </a>
        </div>
    </div>

    <!-- Kembali -->
    <div class="text-center mt-6">
        <a href="{{ route('industri') }}"
           class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
            Kembali
        </a>
    </div>
</div>
