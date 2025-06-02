<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Illuminate\Support\Facades\DB;
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
        // Hapus data industri
        $industri = Industri::findOrFail($id);
        // Cek apakah ada relasi dengan PKL
        if ($industri->pkl()->exists()) {
            // Jika ada relasi, kembalikan pesan error atau lakukan penanganan lain
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Data industri tidak bisa dihapus karena terkait dengan PKL.'
            ]);
            return;
        }

        // Jika tidak ada relasi, hapus data siswa
        $industri->delete();

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Data industri berhasil dihapus.'
        ]);
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
