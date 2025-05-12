<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;

class View extends Component
{
    public $guru;

    public function mount($id)
    {
        $this->guru = Guru::findOrFail($id);
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
        return view('livewire.guru.view');
    }
}
