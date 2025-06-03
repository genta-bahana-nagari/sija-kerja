<div class="p-4">
    <!-- Header -->
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            @if(auth()->check() && auth()->user()->hasRole('Guru') && !auth()->user()->guru)
                <!-- <a href="{{ route('guru.create') }}"
                class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-200
                dark:bg-blue-500 dark:hover:bg-blue-800">
                    Tambah Guru
                </a> -->
            @endif
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-end space-x-4">
            <div class="flex items-center space-x-2">
                @if(auth()->check() && auth()->user()->hasRole('Siswa'))
                <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-200">Cari:</label>
                <input wire:model.live="search" id="search" type="text" placeholder="nama guru disini..."
                       class="w-full md:w-72 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                @endif
            </div>
        </div>
    </div>

    <!-- Flash message -->
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
                    <tr class="border-b dark:bg-gray-800 dark:hover:bg-gray-500 whitespace-nowrap">
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ \Illuminate\Support\Str::limit($guru->nama, 15) }}</td>
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $guru->nip }}</td>
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $guru->kontak }}</td>
                        <td class="px-6 py-3 text-gray-900 dark:text-gray-100">{{ $guru->email }}</td>
                        <td class="px-6 py-3 text-center">
                            <div x-data="{ open: false }" class="inline-block text-left">
                                <button @click="open = !open" class="text-gray-900 dark:text-gray-100 focus:outline-none transition duration-200">
                                    &#8942;
                                </button>
                                <div x-show="open" x-transition @click.away="open = false"
                                    class="cursor-pointer absolute right-0 mt-2 w-36 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded shadow-md z-50">
                                    <a href="{{ route('guru.show', ['id' => $guru->id]) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                        <x-heroicon-o-eye class="w-4 h-4 inline-block mr-2" />
                                        Detail
                                    </a>

                                    @if(auth()->user() || auth()->user()->hasRole('Guru') || auth()->user()->hasRole('super_admin'))
                                    <a href="{{ route('guru.edit', ['id' => $guru->id]) }}"
                                    class="block px-4 py-2 text-sm text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150">
                                        <x-heroicon-o-pencil class="w-4 h-4 inline-block mr-2" />
                                        Update
                                    </a>
                                    @endif

                                    @if(auth()->user()->hasRole('super_admin') || 
                                        (auth()->user()->hasRole('Guru') && !$guru->industri()->exists() && !$guru->pkl()->exists())
                                    )
                                    <button 
                                        onclick="confirm('Yakin ingin menghapus data ini?') || event.stopImmediatePropagation()" 
                                        wire:click="delete({{ $guru->id }})" 
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-150 cursor-pointer"
                                    >
                                        <x-heroicon-o-trash class="w-4 h-4 inline-block mr-2" />    
                                        Hapus
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center py-4 dark:bg-gray-800 text-gray-900 dark:text-gray-100">Tidak ada data ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
