<div class="p-4 dark:bg-none min-h-screen">
    <!-- Header -->
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            @if(auth()->check() && auth()->user()->hasRole('Siswa'))
            <a href="{{ route('industri.create') }}"
                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200
                dark:bg-blue-500 dark:hover:bg-blue-800">
                Tambah Industri
            </a>
            @endif
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end space-x-4">
            <div class="flex items-center space-x-2">
                <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-200">Cari:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="nama industri disini..."
                       class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
        @php
            $message = session('message');
            $type = $message['type'] ?? 'info';
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

    <!-- Card List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($industriList as $industri)
            <div class="relative max-w-sm rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition duration-300">
                <!-- Kebab Menu - Above Image -->
                <div class="absolute top-2 right-2 z-10">
                    <div x-data="{ open: false }" class="inline-block text-left">
                        <button @click="open = !open" class="text-gray-100 focus:outline-none transition duration-200">
                            &#8942;
                        </button>
                        <div x-show="open" x-transition @click.away="open = false" class="absolute right-0 mt-2 w-36 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded shadow-md z-50 text-xs">
                            <a href="{{ route('industri.show', ['id' => $industri->id]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                <x-heroicon-o-eye class="w-4 h-4 inline-block mr-2" />
                                Detail</a>
                            <a href="{{ route('industri.edit', ['id' => $industri->id]) }}" class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                <x-heroicon-o-pencil class="w-4 h-4 inline-block mr-2" />
                                Update</a>
                            <button 
                                onclick="confirm('Yakin ingin menghapus data ini?') || event.stopImmediatePropagation()" 
                                wire:click="delete({{ $industri->id }})" 
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150 cursor-pointer"
                            >
                                <x-heroicon-o-trash class="w-4 h-4 inline-block mr-2" />    
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Industri Image -->
                <div class="relative">
                    <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('storage/'.$industri->foto) }}" alt="{{ $industri->nama }}">
                </div>

                <!-- Card Body -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ \Illuminate\Support\Str::limit($industri->nama, 15) }}</h3>
                    <div class="font-semibold inline-block bg-blue-600 text-white px-3 py-1 rounded-full text-xs">
                        {{ $industri->bidang_usaha }}
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Illuminate\Support\Str::limit($industri->alamat, 30) }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $industri->kontak }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $industri->email }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Pembimbing: 
                        @if ($industri->guru)
                            {{ \Illuminate\Support\Str::limit($industri->guru->nama, 10) }}
                        @else
                            <em>{{ __('Guru Pembimbing Tidak Ditemukan') }}</em>
                        @endif
                    </p>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-4 text-gray-600 dark:text-gray-400">
                Tidak ada data ditemukan.
            </div>
        @endforelse
    </div>

    <!-- Pagination Section -->
    @if(auth()->user())
        <div class="my-4">
            <div class="flex justify-between items-center mb-4">
                <!-- Page Size Selection -->
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm font-medium text-gray-700 dark:text-gray-300">Tampilkan:</label>
                    <select wire:model="numpage" wire:change="updatePageSize($event.target.value)" id="perPage" class="px-3 py-2 border rounded-md text-gray-700 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600">
                        @if($industriList->total() >= 10)
                            <option value="10">10</option>
                        @endif
                        @if($industriList->total() >= 25)
                            <option value="25">25</option>
                        @endif
                        @if($industriList->total() >= 50)
                            <option value="50">50</option>
                        @endif
                        <option value="{{ $industriList->total() }}">semua</option>
                    </select>
                    <span class="text-sm text-gray-700 dark:text-gray-300">data per halaman</span>
                </div>

                <!-- Pagination Controls -->
                <div class="flex justify-end">
                    {{ $industriList->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endif
</div>
