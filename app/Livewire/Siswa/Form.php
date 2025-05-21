<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $id, $nama, $nis, $gender, $alamat, $kontak, $email, $foto;
    public $status_pkl = '0';

    public function mount($id = null)
    {
        // Cegah user yang sudah punya data Siswa membuat entri baru
        $existingSiswa = Auth::user()->siswa;

        if (!$id && $existingSiswa) {
            // Tidak mengizinkan akses create form
            abort(403, 'Kamu sudah mengisi data siswa.');
        }

        // Jika sedang edit
        if ($id) {
            $siswa = Siswa::findOrFail($id);
            $this->id = $siswa->id;
            $this->nama = $siswa->nama;
            $this->nis = $siswa->nis;
            $this->gender = $siswa->gender;
            $this->alamat = $siswa->alamat;
            $this->kontak = $siswa->kontak;
            $this->email = $siswa->email;
            $this->foto = $siswa->foto;
            $this->status_pkl = $siswa->status_pkl;
        }
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa,nis,' . $this->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:siswa,email,' . $this->id,
            'foto' => 'nullable|image',
            'status_pkl' => 'required|in:0,1',
        ];
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->foto;

        if ($this->foto && !is_string($this->foto)) {
            $imagePath = $this->foto->store('foto_siswa', 'public');
        }

        $data = [
            'nama' => $this->nama,
            'nis' => $this->nis,
            'gender' => $this->gender,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
            'foto' => $imagePath,
            'status_pkl' => (int) $this->status_pkl,
        ];

        // Tambahkan user_id jika ini insert baru
        if (!$this->id) {
            $data['user_id'] = auth()->id();
        }

        Siswa::updateOrCreate(
            ['id' => $this->id],
            $data
        );

        session()->flash('message', 'Data siswa berhasil disimpan.');
        return redirect()->route('siswa');
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}