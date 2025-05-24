<div class="p-4 dark:bg-none min-h-screen">
    <!-- Header -->
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            @if(auth()->check() && auth()->user()->hasRole('Siswa') && !auth()->user()->siswa)
                <a href="{{ route('siswa.create') }}"
                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200
                dark:bg-blue-500 dark:hover:bg-blue-800">
                    Tambah Siswa
                </a>
            @endif
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end space-x-4">
            <div class="flex items-center space-x-2">
                @if(auth()->check() && auth()->user()->hasRole('Guru'))
                <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-200">Cari:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="nama siswa disini..."
                       class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                @endif
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-100">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">Foto Siswa</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">NIS</th>
                    <th scope="col" class="px-6 py-3">Status PKL</th>
                    <th scope="col" class="px-6 py-3">Kontak</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswaList as $siswa)
                    <tr class="border-b dark:bg-gray-800 dark:hover:bg-gray-500 whitespace-nowrap">
                        <td class="px-6 py-3">
                            <img src="{{ asset('storage/'.$siswa->foto) }}"
                                class="object-cover rounded-full dark:border-gray-700"
                                alt="{{ $siswa->foto }}">
                        </td>
                        <td class="px-6 py-3">{{ \Illuminate\Support\Str::limit($siswa->nama, 25) }}</td>
                        <td class="px-6 py-3">{{ $siswa->nis }}</td>
                        <td class="px-6 py-3">{{ $this->ketStatusPKL($siswa->status_pkl) }}</td>
                        <td class="px-6 py-3">{{ $siswa->kontak }}</td>
                        <td class="px-6 py-3 text-center">
                            <div x-data="{ open: false }" class="inline-block text-left">
                                <button @click="open = !open" class="text-gray-900 dark:text-gray-100 focus:outline-none transition duration-200">
                                    &#8942;
                                </button>
                                <div x-show="open" x-transition @click.away="open = false"
                                    class="cursor-pointer absolute right-0 mt-2 w-36 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded shadow-md z-50">
                                    <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">View</a>
                                    @if(auth()->user() && auth()->user()->hasRole('Siswa'))
                                    <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}"
                                    class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">Edit</a>
                                    @endif
                                    @if(auth()->user() && auth()->user()->hasRole('super_admin'))
                                    <button wire:click="delete({{ $siswa->id }})"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-500 transition duration-150">Hapus</button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(auth()->user() && auth()->user()->hasRole('Guru'))
        <div class="my-4">
            <!-- Pagination Links -->
            <div class="flex justify-between items-center mb-4">
                <!-- Page Size Selection -->
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm font-medium text-gray-700 dark:text-gray-300">Tampilkan:</label>
                    <select wire:model="numpage" wire:change="updatePageSize($event.target.value)" id="perPage" class="px-3 py-2 border rounded-md text-gray-700 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600">
                        @if($siswaList->total() >= 10)
                            <option value="10">10</option>
                        @endif
                        @if($siswaList->total() >= 25)
                            <option value="25">25</option>
                        @endif
                        @if($siswaList->total() >= 50)
                            <option value="50">50</option>
                        @endif
                        <option value="{{ $siswaList->total() }}">semua</option>
                    </select>
                    <span class="text-sm text-gray-700 dark:text-gray-300">data per halaman</span>
                </div>
                
                <!-- Pagination Controls -->
                <div class="flex justify-end">
                    {{ $siswaList->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endif
</div>
