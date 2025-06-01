<?php

namespace App\Livewire\Siswa; 

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;
    public $userMail;

    public function mount()
    {
        $this->userMail = Auth::user()->email;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();

        if ($user->hasRole('Siswa')) {
            $siswaList = Siswa::where('email', $user->email)->get();

            return view('livewire.siswa.index', [
                'siswaList' => $siswaList,
            ]);
        }

        $query = Siswa::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nis', 'like', '%' . $this->search . '%');
            });
        }

        $siswaList = $query->paginate($this->numpage);

        return view('livewire.siswa.index', [
            'siswaList' => $siswaList,
        ]);
    }

    public function ketGender($gender)
    {
        return $gender === 'L' ? 'Laki-laki' :
               ($gender === 'P' ? 'Perempuan' : 'Status tidak diketahui');
    }

    public function ketStatusPKL($status)
    {
        return $status === 0 ? 'Belum diterima PKL' :
               ($status === 1 ? 'Sudah diterima PKL' : 'Status tidak diketahui');
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Cek apakah ada relasi dengan PKL
        if ($siswa->pkl()->exists()) {
            // Jika ada relasi, kembalikan pesan error atau lakukan penanganan lain
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Data siswa tidak bisa dihapus karena terkait dengan PKL.'
            ]);
            return;
        }

        // Jika tidak ada relasi, hapus data siswa
        $siswa->delete();

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Data siswa berhasil dihapus.'
        ]);
    }

    public function updatePageSize($size)
    {
        $this->numpage = $size;
    }
}