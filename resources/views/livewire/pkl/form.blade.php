<div class="p-6 max-w-3xl mx-auto bg-white dark:bg-gray-900 shadow-lg rounded-lg text-gray-800 dark:text-gray-100">
    @if(auth()->user() && auth()->user()->hasRole('Siswa'))

        <!-- Cek jika siswa sudah pernah lapor PKL -->
        @if($alreadyExists && !$id)
            <!-- Sudah pernah lapor dan bukan sedang edit -->
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    Kamu sudah melaporkan PKL.
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Data kamu sudah tercatat di sistem. Silakan hubungi admin jika ini adalah kesalahan.
                </p>
                <a href="{{ route('pkl') }}"
                class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200">
                    Kembali
                </a>
            </div>
        @else
            <!-- If the student hasn't submitted a PKL report yet, show the form -->
            <h2 class="text-2xl font-semibold mb-6 text-center">
                {{ $id ? 'Edit Laporan' : 'Lapor PKL' }}
            </h2>

            @if (session()->has('message'))
                @php
                    $message = session('message');
                    $type = $message['type'] ?? 'info';  // Default 'info' if no type
                    $text = $message['text'];
                @endphp

                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="p-2 mb-4 rounded text-center
                        @if($type == 'success') bg-green-200 text-green-800 dark:bg-green-800 dark:text-green-200 @endif
                        @if($type == 'warning') bg-yellow-200 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200 @endif
                        @if($type == 'error') bg-red-200 text-red-800 dark:bg-red-800 dark:text-red-200 @endif">
                    
                    <div class="flex items-center justify-center space-x-2">
                        <!-- Icon -->
                        @if($type == 'success')
                            <x-heroicon-o-check-circle class="w-5 h-5 text-green-600 dark:text-green-400" />
                        @elseif($type == 'warning')
                            <x-heroicon-o-exclamation-circle  class="w-5 h-5 text-yellow-600 dark:text-yellow-400" />
                        @elseif($type == 'error')
                            <x-heroicon-o-x-circle class="w-5 h-5 text-red-600 dark:text-red-400" />
                        @else
                            <x-heroicon-o-information-circle class="w-5 h-5 text-gray-600 dark:text-gray-400" />
                        @endif

                        <!-- Message Text -->
                        <span class="text-sm">
                            {{ $text }}
                        </span>
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Siswa -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <label class="block text-sm font-semibold mb-2">Nama Siswa</label>
                    <select wire:model="siswa_id" class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @if($siswa_login)
                            <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
                        @else  
                            <option disabled selected>Nama siswa tidak ditemukan</option>
                        @endif
                    </select>
                    @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Industri Tujuan -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <label class="block text-sm font-semibold mb-2">Industri Tujuan</label>
                    <select wire:model="industri_id" class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih industri tujuan anda</option>
                        @foreach($industriList as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Guru Pembimbing -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <label class="block text-sm font-semibold mb-2">Guru Pembimbing</label>
                    <select wire:model="guru_id" class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih guru pembimbing yang sesuai</option>
                        @foreach($guruList as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Mulai -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <label class="block text-sm font-semibold mb-2">Tanggal Mulai</label>
                    <input type="date" wire:model="mulai" class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <label class="block text-sm font-semibold mb-2">Tanggal Selesai</label>
                    <input type="date" wire:model="selesai" class="w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tombol -->
                <div class="col-span-1 md:col-span-2 flex justify-between pt-6">
                    <a href="{{ route('pkl') }}"
                    class="inline-block text-center bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        Simpan
                    </button>
                </div>
            </form>
        @endif
    @else
        <!-- If user is not a student -->
        <h2 class="text-2xl font-semibold text-center">
            Anda tidak punya akses untuk ini.
        </h2>
    @endif
</div>
