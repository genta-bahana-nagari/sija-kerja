<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $nama;
    public $nis;
    public $gender;
    public $alamat;
    public $kontak;
    public $email;
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
            'status_pkl' => 'required|in:no,yes',
        ];
    }

    public function save()
    {
        $this->validate();

        Siswa::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'nis' => $this->nis,
                'gender' => $this->gender,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'status_pkl' => $this->status_pkl,
            ]
        );

        session()->flash('message', 'Data siswa berhasil disimpan.');

        return redirect()->route('siswa.index');
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}
