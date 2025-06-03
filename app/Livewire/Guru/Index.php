<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

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

    public function delete($id)
    {
        // Hapus data guru
        $guru = Guru::findOrFail($id);
        
        // Cek apakah ada relasi dengan PKL
        if ($guru->pkl()->exists()) {
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Data guru tidak bisa dihapus karena terkait dengan Industri dan PKL.'
            ]);
            return;
        }

        // Cek apakah ada relasi dengan Industri
        if ($guru->industri()->exists()) {
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Data guru tidak bisa dihapus karena terkait dengan Industri.'
            ]);
            return;
        }

        // Jika tidak ada relasi, hapus data guru
        $guru->delete();

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Data guru berhasil dihapus.'
        ]);
    }

    public function render()
    {
        $user = Auth::user();
        
        if ($user->hasRole('Guru')) {
            $guruList = Guru::where('email', $user->email)->get();

            return view('livewire.guru.index', [
                'guruList' => $guruList,
            ]);
        }

        
        $query = Guru::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nip', 'like', '%' . $this->search . '%');
            });
        }

        $guruList = $query->get();

        return view('livewire.guru.index', [
            'guruList' => $guruList,
        ]);
    }
    
    public function ketGender($gender)
    {
        if ($gender === 'L') {
            return 'Laki-laki';
        } elseif ($gender === 'P') {
            return 'Perempuan';
        } else {
            return 'Status tidak diketahui';
        }
    }
}
