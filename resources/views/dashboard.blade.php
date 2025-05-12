<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl p-6">
        
        <!-- Pengenalan Aplikasi -->
        <div class="bg-blue-100 text-blue-800 p-4 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-center">Selamat datang di Aplikasi Siswa</h2>
            <p class="mt-2 text-sm">
                Aplikasi ini dirancang untuk mempermudah pengelolaan data siswa, termasuk pencatatan informasi pribadi,
                status PKL, dan berbagai informasi penting lainnya. Anda dapat menambah, mengedit, dan menghapus data siswa dengan mudah.
            </p>
        </div>

        <!-- Peringatan atau Informasi Penting -->
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold text-center">Peringatan!</h2>
            <p class="mt-2 text-sm">
                Pastikan untuk memeriksa kembali data yang Anda inputkan sebelum menyimpan. Data yang tidak lengkap atau salah
                dapat memengaruhi laporan dan pengelolaan informasi siswa.
            </p>
        </div>

        <!-- Dashboard Content (Placeholder Cards) -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3 mt-6">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>

        <!-- Additional Section -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 mt-6">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>

    </div>
</x-layouts.app>
