<div class="max-w-xl mx-auto bg-white shadow-md rounded p-6 mt-10">
    <h2 class="text-xl font-bold mb-4">Detail Siswa</h2>

    <div class="mb-2">
        <strong>Nama:</strong> {{ $siswa->nama }}
    </div>

    <div class="mb-2">
        <strong>NIS:</strong> {{ $siswa->nis }}
    </div>

    <div class="mb-2">
        <strong>Status PKL:</strong> {{ $this->ketGender($siswa->gender) }}
    </div>

    <div class="mb-2">
        <strong>Alamat:</strong> {{ $siswa->alamat }}
    </div>

    <div class="mb-2">
        <strong>Kontak:</strong> {{ $siswa->kontak }}
    </div>

    <div class="mb-2">
        <strong>Email:</strong> {{ $siswa->email }}
    </div>

    <div class="mb-2">
        <strong>Status PKL:</strong> {{ $this->ketStatusPKL($siswa->status_pkl) }}
    </div>

    <!-- Tambahkan field lain sesuai kebutuhan -->

    <a href="{{ route('siswa.index') }}"
       class="inline-block mt-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
        Kembali
    </a>
</div>