<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
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
        Siswa::findOrFail($id)->delete();
        session()->flash('message', 'Data siswa berhasil dihapus.');
    }

    // Method for handling render
    public function render()
    {
        $query = Siswa::query();

        if (!empty($this->search)) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nis', 'like', '%' . $this->search . '%');
        }

        $this->siswaList = $query->paginate($this->numpage);

        return view('livewire.siswa.index', [
            'siswaList' => $this->siswaList,
        ]);
    }

    // Method to update number of items per page
    public function updatePageSize($size)
    {
        $this->numpage = $size;
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

    public function ketStatusPKL($status)
    {
        if ($status === 'no') {
            return 'Belum diterima PKL';
        } elseif ($status === 'yes') {
            return 'Sudah diterima PKL';
        } else {
            return 'Status tidak diketahui';
        }
    }
}
