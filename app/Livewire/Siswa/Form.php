<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $id, $nama, $nis, $gender, $alamat, $kontak, $email, $foto;
    public $status_pkl = 'no';

    public function mount($id = null)
    {
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
            'foto' => 'nullable',
            'status_pkl' => 'required',
        ];
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->foto;

        if ($this->foto && !is_string($this->foto)) {
            // Jika user mengupload file baru
            $imagePath = $this->foto->store('foto_siswa', 'public');
        }

        Siswa::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'nis' => $this->nis,
                'gender' => $this->gender,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'foto' => $imagePath,
                'status_pkl' => $this->status_pkl,
            ]
        );

        session()->flash('message', 'Data siswa berhasil disimpan.');

        return redirect()->route('siswa');
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}
