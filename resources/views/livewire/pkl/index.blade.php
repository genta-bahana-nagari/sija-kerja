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

    <!-- Flash Message -->
    @if (session()->has('message'))
        @php
            $message = session('message');
            $type = $message['type'] ?? 'info';  // Default 'info' if no type
            $text = $message['text'];
        @endphp

        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="p-2 mb-4 rounded text-center
                @if($type == 'success') bg-green-200 text-green-800 dark:bg-green-800 dark:text-green-200 @endif
                @if($type == 'warning') bg-yellow-200 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200 @endif
                @if($type == 'error') bg-red-200 text-red-800 dark:bg-red-800 dark:text-red-200 @endif">
            
            <div class="flex items-center justify-center space-x-2">
                <!-- Icon -->
                @if($type == 'success')
                    <x-heroicon-o-check-circle class="w-5 h-5 text-green-600 dark:text-green-400" />
                @elseif($type == 'warning')
                    <x-heroicon-o-exclamation-circle  class="w-5 h-5 text-yellow-600 dark:text-yellow-400" />
                @elseif($type == 'error')
                    <x-heroicon-o-x-circle class="w-5 h-5 text-red-600 dark:text-red-400" />
                @else
                    <x-heroicon-o-information-circle class="w-5 h-5 text-gray-600 dark:text-gray-400" />
                @endif

                <!-- Message Text -->
                <span class="text-sm">
                    {{ $text }}
                </span>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg">
        <table class="w-full text-sm text-left table-fixed text-gray-700 dark:text-gray-100">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Nama Siswa</th>
                    <th scope="col" class="px-6 py-3">Industri</th>
                    <th scope="col" class="px-6 py-3 whitespace-nowrap">Guru Pembimbing</th>
                    <th scope="col" class="px-6 py-3 text-center whitespace-nowrap">Tanggal Mulai</th>
                    <th scope="col" class="px-6 py-3 text-center whitespace-nowrap">Tanggal Selesai</th>
                    <th scope="col" class="px-6 py-3 text-center whitespace-nowrap">Durasi (hari)</th>
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
                            {{ \Illuminate\Support\Str::limit($pkl->siswa->nama, 25) }}
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
                    <td class="px-6 py-3 text-center whitespace-nowrap">{{ $pkl->mulai }}</td>
                    <td class="px-6 py-3 text-center whitespace-nowrap">{{ $pkl->selesai }}</td>
                    <td class="px-6 py-3 text-center whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays($pkl->selesai) }} hari
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div x-data="{ open: false }" class="inline-block text-left">
                            <button @click="open = !open" class="text-gray-900 dark:text-gray-100 focus:outline-none transition duration-200">
                                &#8942;
                            </button>
                            <div x-show="open" x-transition @click.away="open = false"
                                class="cursor-pointer absolute right-0 mt-2 w-36 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded shadow-md z-50">
                                <a href="{{ route('pkl.show', ['id' => $pkl->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                    <x-heroicon-o-eye class="w-4 h-4 inline-block mr-2" />
                                    Detail
                                </a>
                                @if(auth()->user() && auth()->user()->hasRole('Siswa'))
                                <a href="{{ route('pkl.edit', ['id' => $pkl->id]) }}"
                                class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                    <x-heroicon-o-pencil class="w-4 h-4 inline-block mr-2" />
                                    Update
                                </a>
                                @endif
                                @if(auth()->user() && auth()->user()->hasRole('super_admin'))
                                <button wire:click="delete({{ $pkl->id }})"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-500 transition duration-150">
                                    <x-heroicon-o-trash class="w-4 h-4 inline-block mr-2" />
                                    Hapus
                                </button>
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