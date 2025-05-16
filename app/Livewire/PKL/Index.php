<?php

namespace App\Livewire\PKL;

use App\Models\PKL;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;
    public $userMail;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        PKL::findOrFail($id)->delete();
        session()->flash('message', 'Data PKL berhasil dihapus.');
    }

    public function render()
    {
        $query = PKL::query();

        if (!empty($this->search)) {
            $query->join('siswa', 'pkl.siswa_id', '=', 'siswa.id')
                  ->join('industri', 'pkl.industri_id', '=', 'industri.id')
                  ->join('guru', 'pkl.guru_id', '=', 'guru.id')
                  ->where(function ($q) {
                      $q->where('siswa.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('industri.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('guru.nama', 'like', '%' . $this->search . '%');
                  });
        }

        $pklList = $query->select('pkl.*')->paginate($this->numpage);

        return view('livewire.pkl.index', [
            'pklList' => $pklList,
            'siswa_login'=>Siswa::where('email','=',$this->userMail)->first(),
        ]);
    }
}
