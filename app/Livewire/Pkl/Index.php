<?php

namespace App\Livewire\Pkl;

use App\Models\PKL;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
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
        PKL::findOrFail($id)->delete();
        session()->flash('message', [
            'type' => 'success',
            'text' => 'Laporan PKL berhasil dihapus.'
        ]);
    }

    public function render()
    {
        $user = Auth::user();

        $query = PKL::query()->with(['siswa', 'industri', 'guru']);

        if ($user->hasRole('Siswa')) {
            $siswa = Siswa::where('email', $this->userMail)->first();
            if ($siswa) {
                $query->where('siswa_id', $siswa->id);
            } else {
                // Jika tidak ada data siswa ditemukan, kembalikan query kosong
                $query->whereRaw('1 = 0');
            }
        } elseif (!empty($this->search)) {
            $query->join('siswa', 'pkl.siswa_id', '=', 'siswa.id')
                  ->join('industri', 'pkl.industri_id', '=', 'industri.id')
                  ->join('guru', 'pkl.guru_id', '=', 'guru.id')
                  ->where(function ($q) {
                      $q->where('siswa.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('industri.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('guru.nama', 'like', '%' . $this->search . '%');
                  })
                  ->select('pkl.*');
        }

        $pklList = $query->paginate($this->numpage);

        return view('livewire.pkl.index', [
            'pklList' => $pklList,
            'siswa_login' => Siswa::where('email', '=', $this->userMail)->first(),
        ]);
    }
}
