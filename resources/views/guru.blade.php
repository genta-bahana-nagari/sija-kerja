<x-layouts.app>
    <div class="relative mb-4 w-full grid grid-cols-12 gap-4">
        <!-- Header Section -->
        <div class="col-span-12 md:col-span-6">
            <flux:heading size="xl" level="1">{{ __('Tabel Guru') }}</flux:heading>
            <flux:subheading size="lg" class="mb-4">{{ __('Pantau data guru disini') }}</flux:subheading>
        </div>

        <!-- Add Siswa Button -->
        <div class="col-span-12 md:col-span-6 flex justify-end items-center">
            <a href="{{ route('guru.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-200">
                Tambah Guru
            </a>
        </div>
    </div>

    <flux:separator variant="subtle" class="my-2" />

    <livewire:guru.index />
</x-layouts.app>
