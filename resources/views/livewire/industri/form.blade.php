<div class="p-6 max-w-3xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg text-gray-800 dark:text-gray-100">
    @if(auth()->user() && auth()->user()->hasRole('Siswa'))
    <h2 class="text-2xl font-semibold mb-6 text-center">
        {{ $id ? 'Edit Industri' : 'Tambah Industri' }}
    </h2>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Foto Industri -->
        <div>
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Foto Industri</label>
            <input type="file"
                   class="w-full py-2 px-3 border border-gray-300 dark:border-gray-600 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100"
                   wire:model="foto">
            @error('foto') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <!-- Grid 2 Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama</label>
                <input type="text" wire:model="nama"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Bidang Usaha -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Bidang Usaha</label>
                <input type="text" wire:model="bidang_usaha"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Alamat</label>
                <textarea wire:model="alamat"
                          class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                          rows="2"></textarea>
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Kontak -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kontak</label>
                <input type="text" wire:model="kontak"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" wire:model="email"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Website -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Website Perusahaan</label>
                <input type="text" wire:model="website"
                       class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Guru Pembimbing -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Guru Pembimbing</label>
                <select wire:model="guru_pembimbing"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Guru Pembimbing</option>
                    @foreach($guruList as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_pembimbing') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between">
            <a href="{{ route('industri') }}"
               class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-700 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
                Cancel
            </a>

            <button type="submit"
                    class="bg-blue-600 cursor-pointer text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
    @else
    <h2 class="text-2xl font-semibold my-6 text-center">
        Anda tidak punya akses untuk ini.
    </h2>
    @endif
</div>