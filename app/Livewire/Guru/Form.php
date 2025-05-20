<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $id, $nama, $nip, $gender, $alamat, $kontak, $email;

    public function mount($id = null)
    {
        // Cegah user yang sudah punya data Guru membuat entri baru
        $existingGuru = Auth::user()->guru;

        if (!$id && $existingGuru) {
            // Tidak mengizinkan akses create form
            abort(403, 'Kamu sudah mengisi data guru.');
        }

        // Jika sedang edit
        if ($id) {
            $guru = Guru::findOrFail($id);
            $this->id = $guru->id;
            $this->nama = $guru->nama;
            $this->nip = $guru->nip;
            $this->gender = $guru->gender;
            $this->alamat = $guru->alamat;
            $this->kontak = $guru->kontak;
            $this->email = $guru->email;
        }
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:guru,nip,' . $this->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:guru,email,' . $this->id,
        ];
    }

    public function save()
    {
        $this->validate();

        $data = [
            'nama' => $this->nama,
            'nip' => $this->nip,
            'gender' => $this->gender,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'email' => $this->email,
        ];

        // Tambahkan user_id jika ini insert baru
        if (!$this->id) {
            $data['user_id'] = auth()->id();
        }

        Guru::updateOrCreate(
            ['id' => $this->id],
            $data
        );

        session()->flash('message', 'Data guru berhasil disimpan.');
        return redirect()->route('guru');
    }

    public function render()
    {
        return view('livewire.guru.form');
    }
}