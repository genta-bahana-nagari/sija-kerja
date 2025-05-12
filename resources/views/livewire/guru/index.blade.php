<div class="p-4">
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
            </tbody>
        </table>
    </div>
</div>
