<div class="p-6 max-w-3xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg text-gray-800 dark:text-gray-100">
    @if(auth()->user() && auth()->user()->hasRole('Guru'))
        @if($alreadyExists && !$id)
            <!-- Tampilan jika sudah mengisi data -->
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Anda sudah mengisi data guru.
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Data anda sudah tercatat di sistem. Silakan hubungi admin jika ini adalah kesalahan.
                </p>
                <a href="{{ route('guru') }}"
                class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200">
                Kembali
                </a>
            </div>
        @else
        <h2 class="text-2xl font-semibold mb-6 text-center">{{ $id ? 'Edit Guru' : 'Tambah Guru' }}</h2>

        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">Nama</label>
                <input type="text" wire:model="nama"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- NIP -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">NIP</label>
                <input type="text" wire:model="nip"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Gender -->
            <div class="col-span-1 md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">Gender</label>
                <flux:radio.group wire:model="gender">
                    <flux:radio value="L" label="Laki Laki" />
                    <flux:radio value="P" label="Perempuan" />
                </flux:radio.group>
                @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Alamat -->
            <div class="col-span-1 md:col-span-2 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">Alamat</label>
                <textarea wire:model="alamat"
                        class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        rows="2" placeholder="Alamat lengkap"></textarea>
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Kontak -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">Kontak</label>
                <input type="text" wire:model="kontak"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <label class="block text-sm font-semibold mb-2">Email</label>
                <input type="email" wire:model="email"
                    class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Tombol -->
            <div class="col-span-1 md:col-span-2 flex justify-between pt-6">
                <!-- Cancel Button -->
                <a href="{{ route('guru') }}"
                class="inline-block text-center bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                    Cancel
                </a>

                <!-- Submit Button -->
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                    Simpan
                </button>
            </div>
        </form>
        @endif
    @else
    <h2 class="text-2xl font-semibold text-center">
        Anda tidak punya akses untuk ini.
    </h2>
    @endif
</div>
