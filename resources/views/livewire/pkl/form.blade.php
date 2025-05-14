<div class="p-6 max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">
        {{ $id ? 'Edit Laporan' : 'Lapor PKL' }}
    </h2>

    <form wire:submit.prevent="save" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama Siswa -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <select wire:model="siswa_id" class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Cari nama anda</option>
                    @foreach($siswaList as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
                @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Industri Tujuan -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Industri Tujuan</label>
                <select wire:model="industri_id" class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih industri tujuan anda</option>
                    @foreach($industriList as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                    @endforeach
                </select>
                @error('industri_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Guru Pembimbing -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Guru Pembimbing</label>
                <select wire:model="guru_id" class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih guru pembimbing yang sesuai</option>
                    @foreach($guruList as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tanggal Mulai -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" wire:model="mulai" class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tanggal Selesai -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" wire:model="selesai" class="w-full mt-1 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('pkl') }}" class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
                Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
