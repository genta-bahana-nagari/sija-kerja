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
                    <td>{{ $siswa->gender }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}" class="text-blue-600">Edit</a>
                        <button wire:click="delete({{ $siswa->id }})" class="text-red-600 ml-2">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
