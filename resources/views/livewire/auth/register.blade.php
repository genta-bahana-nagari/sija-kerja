<div class="flex flex-col gap-6 bg-white/80 dark:bg-[#121212]/80">
    <x-auth-header :title="__('Buat akun anda')" :description="__('Masukkan detail anda di bawah ini untuk membuat akun')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Nama lengkap')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Nama lengkap')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Alamat email')"
            type="email"
            required
            autocomplete="email"
            placeholder="contoh@email.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Konfirmasi password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Konfirmasi password')"
            viewable
        />

        <!-- Role Selection (Teacher or Student) -->
        <!-- Jika ingin menambahkan pilihan peran, bisa uncomment bagian ini -->
        <!-- <div class="flex flex-col gap-2">
            <label for="role" class="font-semibold">{{ __('Pilih Jenis Akun') }}</label>
            <select wire:model="role" id="role" required class="p-2 border border-gray-300 rounded">
                <option value="">{{ __('Pilih Peran') }}</option>
                <option value="guru">{{ __('Guru') }}</option>
                <option value="siswa">{{ __('Siswa') }}</option>
            </select>
        </div> -->

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full cursor-pointer bg-blue-600 hover:bg-black transition-all duration-150">
                {{ __('Buat akun') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Sudah memiliki akun?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Masuk') }}</flux:link>
    </div>
</div>
