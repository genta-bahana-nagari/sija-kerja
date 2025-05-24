<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Industri::findOrFail($id)->delete();
        session()->flash('message', 'Data industri berhasil dihapus.');
    }

    public function render()
    {
        $query = Industri::query();
        
        if (!empty($this->search)) {
        $query->join('guru', 'industri.guru_pembimbing', '=', 'guru.id')
                ->where('industri.nama', 'like', '%' . $this->search . '%')
                ->orWhere('guru.nama', 'like', '%' . $this->search . '%');
        }

        $this->industriList = $query->select('industri.*')->paginate($this->numpage);

        return view('livewire.industri.index', [
            'industriList' => $this->industriList,
        ]);
    }

    public function updatePageSize($size)
    {
        $this->numpage = $size;
    }
}
