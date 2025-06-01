<div class="p-6 max-w-3xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg text-gray-800 dark:text-gray-100">
    @if(auth()->user() && auth()->user()->hasRole('Siswa'))
    <h2 class="text-2xl font-semibold mb-6 text-center">
        {{ $id ? 'Edit Industri' : 'Tambah Industri' }}
    </h2>

    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Foto Industri -->
        <div class="col-span-1 md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Foto Industri</label>
            <input type="file"
                wire:model="foto"
                class="w-full text-sm bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('foto') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Nama Industri -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Nama Industri</label>
            <input type="text" wire:model="nama"
                placeholder="Nama Industri"
                class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Bidang Usaha -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Bidang Usaha</label>
            <input type="text" wire:model="bidang_usaha"
                placeholder="Bidang Usaha"
                class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Alamat -->
        <div class="col-span-1 md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Alamat</label>
            <textarea wire:model="alamat"
                    rows="2"
                    placeholder="Alamat lengkap"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kontak -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Kontak</label>
            <input type="text" wire:model="kontak"
                placeholder="Nomor Kontak"
                class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Email</label>
            <input type="email" wire:model="email"
                placeholder="Email Industri"
                class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Website -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Website</label>
            <input type="text" wire:model="website"
                placeholder="Website Perusahaan"
                class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Guru Pembimbing -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
            <label class="block text-sm font-semibold mb-2">Guru Pembimbing</label>
            <select wire:model="guru_pembimbing"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Guru Pembimbing</option>
                @foreach($guruList as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
            @error('guru_pembimbing') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Tombol -->
        <div class="col-span-1 md:col-span-2 flex justify-between pt-6">
            <a href="{{ route('industri') }}"
            class="inline-block text-center bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                Cancel
            </a>
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
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