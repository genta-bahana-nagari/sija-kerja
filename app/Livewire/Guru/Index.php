<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Livewire\Component;

class Index extends Component
{

    public $guruList;

    public function mount()
    {
        $this->guruList = Guru::all();
    }

    public function delete($id)
    {
        Guru::findOrFail($id)->delete();
        $this->guruList = Guru::all();
        session()->flash('message', 'Data guru berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.guru.index');
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
