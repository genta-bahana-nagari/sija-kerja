<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Livewire\Component;

class View extends Component
{
    public $industri;

    public function mount($id)
    {
        $this->industri = Industri::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.industri.view');
    }
}
