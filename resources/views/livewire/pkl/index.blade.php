<div class="p-4">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            <a href="{{ route('pkl.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-200">
                Lapor PKL
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end items-center space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700">Search:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="Search laporan..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Siswa</th>
                    <th scope="col" class="px-6 py-3">Industri</th>
                    <th scope="col" class="px-6 py-3">Guru Pembimbing</th>
                    <th scope="col" class="px-6 py-3 text-center">Tanggal Mulai</th>
                    <th scope="col" class="px-6 py-3 text-center">Tanggal Selesai</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pklList as $pkl)
                <tr class="border-b hover:bg-gray-50 whitespace-nowrap">
                    <!-- Relasi ke siswa -->
                    <td class="px-6 py-3">
                        @if ($pkl->siswa)
                            {{ $pkl->siswa->nama }}  <!-- Menampilkan nama siswa -->
                        @else
                            <em>{{ __('Nama Siswa Tidak Ditemukan') }}</em>
                        @endif
                    </td>
                    <!-- Relasi ke industri -->
                    <td class="px-6 py-3">
                        @if ($pkl->industri)
                            {{ $pkl->industri->nama }}  <!-- Menampilkan nama industri -->
                        @else
                            <em>{{ __('Industri Tidak Ditemukan') }}</em>
                        @endif
                    </td>
                    <!-- Relasi ke guru -->
                    <td class="px-6 py-3">
                        @if ($pkl->guru)
                            {{ $pkl->guru->nama }}  <!-- Menampilkan nama guru pembimbing -->
                        @else
                            <em>{{ __('Guru Pembimbing Tidak Ditemukan') }}</em>
                        @endif
                    </td>
                    <!-- Tanggal Masuk -->
                    <td class="px-6 py-3">{{ $pkl->mulai }}</td>
                    <!-- Tanggal Keluar -->
                    <td class="px-6 py-3">{{ $pkl->selesai }}</td>
                    <td class="px-6 py-3 text-center">
                        <div x-data="{ open: false }" class="inline-block text-left">
                            <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none transition duration-200">
                                &#8942;
                            </button>
                            <div x-show="open" x-transition @click.away="open = false"
                                class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded shadow-md z-50">
                                <a href="{{ route('pkl.show', ['id' => $pkl->id]) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">View</a>
                                <a href="{{ route('pkl.edit', ['id' => $pkl->id]) }}"
                                   class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 transition duration-150">Edit</a>
                                <button wire:click="delete({{ $pkl->id }})"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition duration-150">Hapus</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
