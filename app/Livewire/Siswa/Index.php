<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;

class Index extends Component
{
    public $siswaList;

    public function mount()
    {
        $this->siswaList = Siswa::all();

        if ($this->siswaList->isEmpty()) {
        session()->flash('message', 'Tidak ada data siswa');
    }
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        $this->siswaList = Siswa::all();
        session()->flash('message', 'Data siswa berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.siswa.index');
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

    public function ketStatusPKL($status)
    {
        if ($status === 'no') {
            return 'Belum diterima PKL';
        } elseif ($status === 'yes') {
            return 'Sudah diterima PKL';
        } else {
            return 'Status tidak diketahui';
        }
    }
}
