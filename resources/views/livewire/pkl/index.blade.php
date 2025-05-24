<div class="p-4">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
        @if(auth()->check() && auth()->user()->hasRole('Siswa') && !auth()->user()->siswa->pkl)
            <a href="{{ route('pkl.create') }}"
                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200
                dark:bg-blue-500 dark:hover:bg-blue-800">
                Lapor PKL
            </a>
        @endif
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end items-center space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-200">Cari:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="Cari laporan..."
                    class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>
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
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-100">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
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
                <tr class="border-b dark:bg-gray-800 dark:hover:bg-gray-500 whitespace-nowrap">
                    <!-- Relasi ke siswa -->
                    <td class="px-6 py-3">
                        @if ($pkl->siswa)
                            <!-- {{ $pkl->siswa->nama }}  Menampilkan nama siswa -->
                            {{ \Illuminate\Support\Str::limit($pkl->siswa->nama, 15) }}
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
                            <button @click="open = !open" class="text-gray-900 dark:text-gray-100 focus:outline-none transition duration-200">
                                &#8942;
                            </button>
                            <div x-show="open" x-transition @click.away="open = false"
                                class="cursor-pointer absolute right-0 mt-2 w-36 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded shadow-md z-50">
                                <a href="{{ route('pkl.show', ['id' => $pkl->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">View</a>
                                @if(auth()->user() && auth()->user()->hasRole('super_admin'))
                                <a href="{{ route('pkl.edit', ['id' => $pkl->id]) }}"
                                    class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">Edit</a>
                                <button wire:click="delete({{ $pkl->id }})"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-500 transition duration-150">Hapus</button>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
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
                        @if($pklList->total() >= 10)
                            <option value="10">10</option>
                        @endif
                        @if($pklList->total() >= 25)
                            <option value="25">25</option>
                        @endif
                        @if($pklList->total() >= 50)
                            <option value="50">50</option>
                        @endif
                        <option value="{{ $pklList->total() }}">semua</option>
                    </select>
                    <span class="text-sm text-gray-700 dark:text-gray-300">data per halaman</span>
                </div>
                
                <!-- Pagination Controls -->
                <div class="flex justify-end">
                    {{ $pklList->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endif
</div>