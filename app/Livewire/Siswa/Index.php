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
}
