<?php

namespace App\Livewire\Guru;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $id, $nama, $nip, $gender, $alamat, $kontak, $email;
    public $alreadyExists = false;

    public function mount($id = null)
    {
        // Cegah user yang sudah punya data Guru membuat entri baru
        $existingGuru = Auth::user()->guru;

        if (!$id && $existingGuru) {
            // Tandai bahwa user sudah punya data siswa, jangan abort langsung
            $this->alreadyExists = true;
            return;
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

        // Tambahkan user_id jika ini insert baru atau jika user_id belum ada pada data yang sedang diedit
        if (!$this->id) {
            // Jika belum ada id, artinya ini adalah insert baru
            $data['user_id'] = auth()->id();
        } else {
            // Jika sudah ada id, periksa apakah user_id sudah terisi
            $guru = Guru::find($this->id);
            if (!$guru->user_id) {
                // Jika user_id masih kosong, set user_id ke auth()->id()
                $data['user_id'] = auth()->id();
            }
        }

        Guru::updateOrCreate(
            ['id' => $this->id],
            $data
        );

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Data guru berhasil disimpan.'
        ]);
        return redirect()->route('guru');
    }

    public function render()
    {
        return view('livewire.guru.form');
    }
}