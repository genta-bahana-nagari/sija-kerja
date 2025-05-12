<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Livewire\Component;

class Index extends Component
{
    public $industriList;

    public function mount()
    {
        $this->industriList = Industri::with('guru')->get();
        
        if ($this->industriList->isEmpty()) {
        session()->flash('message', 'Tidak ada data industri');
        }
    }

    public function delete($id)
    {
        Industri::findOrFail($id)->delete();
        $this->industriList = Industri::with('guru')->get();
        session()->flash('message', 'Data industri berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.industri.index');
    }
}
