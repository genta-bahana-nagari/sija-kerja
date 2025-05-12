<div class="p-4">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            <a href="{{ route('guru.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-200">
                Tambah Guru
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-between items-center space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700">Search:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="Search guru..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
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
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">NIP</th>
                    <th scope="col" class="px-6 py-3">Kontak</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($guruList && $guruList->count())
                    @foreach ($guruList as $guru)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-3">{{ $guru->nama }}</td>
                        <td class="px-6 py-3">{{ $guru->nip }}</td>
                        <td class="px-6 py-3">{{ $guru->kontak }}</td>
                        <td class="px-6 py-3">{{ $guru->email }}</td>
                        <td class="px-6 py-3 text-center">
                            <div x-data="{ open: false }" class="inline-block text-left">
                                <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none transition duration-200">
                                    &#8942;
                                </button>
                                <div x-show="open" x-transition @click.away="open = false"
                                    class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded shadow-md z-50">
                                    <a href="{{ route('guru.show', ['id' => $guru->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">View</a>
                                    <a href="{{ route('guru.edit', ['id' => $guru->id]) }}"
                                    class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 transition duration-150">Edit</a>
                                    <button wire:click="delete({{ $guru->id }})"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition duration-150">Hapus</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada data ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
