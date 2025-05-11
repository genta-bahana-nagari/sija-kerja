<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Daftar Siswa</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('siswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>

    <table class="table-auto w-full mt-4 border">
        <thead class="bg-gray-200">
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswaList as $siswa)
                <tr class="border-b">
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $this->ketGender($siswa->gender) }}</td>
                    <td class="relative">
                        <div x-data="{ open: false }" class="inline-block text-left">
                            <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                &#8942; <!-- Unicode kebab menu (⋮) -->
                            </button>

                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-28 bg-white border border-gray-200 rounded shadow-md z-50">
                                <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View</a>
                                <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}"
                                class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                                <button wire:click="delete({{ $siswa->id }})"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
