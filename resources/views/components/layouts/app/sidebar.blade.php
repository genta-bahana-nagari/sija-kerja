<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-blue-50 dark:bg-blue-950 text-gray-800 dark:text-white">
        <flux:sidebar sticky stashable class="border-e border-transparent bg-gradient-to-b from-blue-200 via-blue-100 to-blue-300 dark:from-blue-950 dark:via-gray-900 dark:to-zinc-900 shadow-md">

            <!-- Toggle Button -->
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <!-- Branding -->
            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse px-4 pt-6 pb-3" wire:navigate>
                <x-app-logo class="h-8 w-auto" />
            </a>

            <!-- Navigation -->
            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    <span class="text-blue-600 dark:text-blue-300">{{ __('Dashboard') }}</span>
                </flux:navlist.item>
            </flux:navlist>

            <!-- Data Personal -->
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Data Personal')" class="grid">
                    <flux:navlist.item icon="user" :href="route('siswa')" :current="request()->routeIs('siswa')" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Siswa') }}</flux:navlist.item>
                    <flux:navlist.item icon="academic-cap" :href="route('guru')" :current="request()->routeIs('guru')" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Guru') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <!-- Data PKL -->
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Data PKL')" class="grid">
                    <flux:navlist.item icon="building-office-2" :href="route('industri')" :current="request()->routeIs('industri')" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Industri') }}</flux:navlist.item>
                    <flux:navlist.item icon="briefcase" :href="route('pkl')" :current="request()->routeIs('pkl')" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Status PKL') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <!-- Back to Home -->
            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" :href="route('home')" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Kembali') }}</flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <!-- User Menu Desktop -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-blue-200 text-black dark:bg-blue-800 dark:text-white">
                                        {{ Str::limit(auth()->user()->initials(), 2, '') }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-gray-600 dark:text-gray-300">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Setting') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-blue-600 dark:text-blue-300">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-blue-200 text-black dark:bg-blue-800 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate class="text-blue-600 dark:text-blue-300">{{ __('Setting') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-blue-600 dark:text-blue-300">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
