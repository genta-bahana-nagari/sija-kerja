<div class="p-6 max-w-3xl mx-auto bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">{{ $id ? 'Edit Industri' : 'Tambah Industri' }}</h2>

    <form wire:submit.prevent="save" class="space-y-6">

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Foto Industri</label>
            <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="foto">
            @error('foto') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" wire:model="nama" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                <input type="text" wire:model="bidang_usaha" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
           
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="textarea" wire:model="alamat" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kontak</label>
                <input type="textarea" wire:model="kontak" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="textarea" wire:model="email" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Website Perusahaan</label>
                <input type="text" wire:model="website" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Opsi Guru Pembimbing</label>
                <select wire:model="guru_pembimbing" class="w-full border border-gray-300 rounded-md px-4 py-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Guru Pembimbing</option>
                    @foreach($guruList as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_pembimbing') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('industri') }}" class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
                Cancel
            </a>

            <button type="submit" class="bg-blue-600 cursor-pointer text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
