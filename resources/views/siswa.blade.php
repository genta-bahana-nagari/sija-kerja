<x-layouts.app>
    <flux:heading size="xl" level="1">{{ __('Tabel Siswa') }}</flux:heading>
    <flux:subheading size="lg" class="mb-4">{{ __('Pantau data siswa disini') }}</flux:subheading>
    <!-- <div class="relative mb-4 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6">
        </div>

        <div class="col-span-12 md:col-span-6 flex justify-end items-center">
            <a href="{{ route('siswa.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-200">
                Tambah Siswa
            </a>
        </div>
    </div> -->

    <flux:separator variant="subtle" class="my-2" />

    <livewire:siswa.index />
</x-layouts.app>
