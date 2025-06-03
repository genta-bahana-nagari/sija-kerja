<div class="flex flex-col gap-6 bg-white/80 dark:bg-black">
    <x-auth-header :title="__('Log in ke akun anda')" :description="__('Masukkan email dan password di bawah ini')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Alamat email')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="contoh@email.com"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Lupa password?') }}
                </flux:link>
            @endif
        </div>
        
        <div class="relative">
            <flux:checkbox wire:model="remember" :label="__('Ingat saya')" />
            <flux:link class="absolute end-0 top-0 text-sm" :href="route('register')" wire:navigate>
                {{ __('Belum punya akun?') }}
            </flux:link>
        </div>
        <!-- Remember Me -->

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full cursor-pointer bg-blue-600 hover:bg-black
            transition-all duration-150">{{ __('Log in') }}</flux:button>
        </div>
    </form>
</div>
