<div class="p-4 dark:bg-none min-h-screen">
    <!-- Header -->
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            <a href="{{ route('siswa.create') }}"
               class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200">
                Tambah Siswa
            </a>
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-200">Search:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="Search siswa..."
                       class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-100">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">Foto</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">NIS</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Status PKL</th>
                    <th scope="col" class="px-6 py-3">Kontak</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($siswaList && $siswaList->count())
                    @foreach ($siswaList as $siswa)
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 whitespace-nowrap">
                            <td class="px-6 py-3 text-center">
                                <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="w-12 h-12 object-cover rounded-full">
                            </td>
                            <td class="px-6 py-3">{{ $siswa->nama }}</td>
                            <td class="px-6 py-3">{{ $siswa->nis }}</td>
                            <td class="px-6 py-3">{{ $this->ketGender($siswa->gender) }}</td>
                            <td class="px-6 py-3">{{ $this->ketStatusPKL($siswa->status_pkl) }}</td>
                            <td class="px-6 py-3">{{ $siswa->kontak }}</td>
                            <td class="px-6 py-3 text-center">
                                <div x-data="{ open: false }" class="inline-block text-left">
                                    <button @click="open = !open"
                                            class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white focus:outline-none transition duration-200">
                                        &#8942;
                                    </button>
                                    <div x-show="open" x-transition @click.away="open = false"
                                         class="absolute right-0 mt-2 w-36 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded shadow-md z-50">
                                        <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}"
                                           class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                            View
                                        </a>
                                        <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}"
                                           class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                            Edit
                                        </a>
                                        <button wire:click="delete({{ $siswa->id }})"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-600 dark:text-gray-300">Tidak ada data ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="my-4">
        <div class="flex justify-between items-center mb-4">
            <!-- Page Size -->
            <div class="flex items-center space-x-2">
                <label for="perPage" class="text-sm font-medium text-gray-700 dark:text-gray-200">Tampilkan:</label>
                <select wire:model="numpage" wire:change="updatePageSize($event.target.value)" id="perPage"
                        class="px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-100 rounded-md">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="{{ $siswaList->total() }}">semua</option>
                </select>
                <span class="text-sm text-gray-700 dark:text-gray-200">data per halaman</span>
            </div>

            <!-- Pagination Links -->
            <div class="flex justify-end">
                {{ $siswaList->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>
