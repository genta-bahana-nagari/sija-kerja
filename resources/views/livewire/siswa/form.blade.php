<div class="p-4 max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">{{ $id ? 'Edit Siswa' : 'Tambah Siswa' }}</h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block">Nama</label>
            <input type="text" wire:model="nama" class="w-full border p-2 rounded" />
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">NIS</label>
            <input type="text" wire:model="nis" class="w-full border p-2 rounded" />
            @error('nis') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Gender</label>
            <select wire:model="gender" class="w-full border p-2 rounded">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('gender') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Alamat</label>
            <textarea wire:model="alamat" class="w-full border p-2 rounded"></textarea>
            @error('alamat') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Kontak</label>
            <input type="text" wire:model="kontak" class="w-full border p-2 rounded" />
            @error('kontak') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" wire:model="email" class="w-full border p-2 rounded" />
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Status PKL</label>
            <select wire:model="status_pkl" class="w-full border p-2 rounded">
                <option value="no">Belum diterima PKL</option>
                <option value="yes">Sudah diterima PKL</option>
            </select>
            @error('status_pkl') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
