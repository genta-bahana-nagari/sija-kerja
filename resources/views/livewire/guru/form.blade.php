<div class="p-6 max-w-3xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg text-gray-800 dark:text-gray-100">
    <h2 class="text-2xl font-semibold mb-6 text-center">{{ $id ? 'Edit Guru' : 'Tambah Guru' }}</h2>

    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Nama -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama</label>
            <input type="text" wire:model="nama"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2
                          bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100
                          focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- NIP -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIP</label>
            <input type="text" wire:model="nip"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2
                          bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100
                          focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('nip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Gender -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 my-2">Gender</label>
            <flux:radio.group wire:model="gender">
                <flux:radio value="L" label="Laki Laki" />
                <flux:radio value="P" label="Perempuan" />
            </flux:radio.group>
            @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Alamat</label>
            <textarea wire:model="alamat"
                      class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2
                             bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100
                             focus:outline-none focus:ring-2 focus:ring-blue-500"
                      rows="2"></textarea>
            @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Kontak -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kontak</label>
            <input type="text" wire:model="kontak"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2
                          bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100
                          focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
            <input type="email" wire:model="email"
                   class="w-full border border-gray-300 dark:border-gray-600 rounded-md px-4 py-2 mt-2
                          bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100
                          focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <!-- Cancel Button -->
            <a href="{{ route('guru') }}"
               class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md
                      hover:bg-gray-700 dark:hover:bg-gray-800 focus:outline-none
                      focus:ring-2 focus:ring-gray-500 transition duration-200">
                Cancel
            </a>

            <!-- Submit Button -->
            <button type="submit"
                    class="bg-blue-600 cursor-pointer text-white px-6 py-3 rounded-md
                           hover:bg-blue-700 focus:outline-none focus:ring-2
                           focus:ring-blue-500 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
