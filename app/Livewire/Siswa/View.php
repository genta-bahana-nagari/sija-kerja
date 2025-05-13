<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class View extends Component
{
    public $siswa;

    public function mount($id)
    {
        $this->siswa = Siswa::findOrFail($id);
    }

    public function ketStatusPKL($status)
    {
        if ($status === 0) {
            return 'Belum diterima PKL';
        } elseif ($status === 1) {
            return 'Sudah diterima PKL';
        } else {
            return 'Status tidak diketahui';
        }
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

    public function render()
    {
        return view('livewire.siswa.view');
    }
}
