<div class="p-4">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            <a href="{{ route('industri.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-200">
                Tambah Industri
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-between items-center space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700">Search:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="Search industri..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
        <table class="table-auto w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Bidang Usaha</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">Kontak</th>
                    <th scope="col" class="px-6 py-3">Guru Pembimbing</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industriList as $industri)
                <tr class="border-b hover:bg-gray-50 whitespace-nowrap">
                    <td class="px-6 py-3">{{ $industri->nama }}</td>
                    <td class="px-6 py-3">{{ \Illuminate\Support\Str::limit($industri->bidang_usaha, 25) }}</td>
                    <td class="px-6 py-3">{{ \Illuminate\Support\Str::limit($industri->alamat, 25) }}</td>
                    <td class="px-6 py-3">{{ $industri->kontak }}</td>
                    <!-- Relasi ke guru -->
                    <td class="px-6 py-3">
                        @if ($industri->guru)
                            {{ $industri->guru->nama }}  <!-- Menampilkan nama guru pembimbing -->
                        @else
                            <em>{{ __('Guru Pembimbing Tidak Ditemukan') }}</em>
                        @endif
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div x-data="{ open: false }" class="inline-block text-left">
                            <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none transition duration-200">
                                &#8942;
                            </button>
                            <div x-show="open" x-transition @click.away="open = false"
                                class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded shadow-md z-50">
                                <a href="{{ route('industri.show', ['id' => $industri->id]) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">View</a>
                                <a href="{{ route('industri.edit', ['id' => $industri->id]) }}"
                                   class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 transition duration-150">Edit</a>
                                <button wire:click="delete({{ $industri->id }})"
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
