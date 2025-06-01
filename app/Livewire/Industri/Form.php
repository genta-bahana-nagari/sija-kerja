<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use App\Models\Guru;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $id, $nama, $bidang_usaha, $alamat, $kontak, $email, $guru_pembimbing, $website, $foto;

    public $guruList = [];

    public function mount($id = null)
    {
        // Ambil daftar guru yang tersedia untuk dropdown
        $this->guruList = Guru::all();

        // Jika ID diterima, maka ini adalah edit form
        if ($id) {
            $industri = Industri::findOrFail($id);
            $this->id = $industri->id;
            $this->nama = $industri->nama;
            $this->bidang_usaha = $industri->bidang_usaha;
            $this->alamat = $industri->alamat;
            $this->kontak = $industri->kontak;
            $this->email = $industri->email;
            $this->guru_pembimbing = $industri->guru_pembimbing;  // Set guru_pembimbing jika edit
            $this->website = $industri->website;
            $this->foto = $industri->foto;
        }
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email',
            'guru_pembimbing' => 'required|exists:guru,id',  // Memastikan guru_pembimbing valid
            'website' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp,webp', 
        ];
    }

    public function save()
    {
        $this->validate();

        // Jika foto ada, simpan foto tersebut
        $imagePath = null;
        if ($this->foto && !is_string($this->foto)) {
            $imagePath = $this->foto->store('foto_industri', 'public');
        } elseif ($this->foto && is_string($this->foto)) {
            // Jika foto sudah ada dalam bentuk string (misal, saat edit)
            $imagePath = $this->foto;
        }

        // Update or create industri
        Industri::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'bidang_usaha' => $this->bidang_usaha,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'guru_pembimbing' => $this->guru_pembimbing,
                'website' => $this->website,
                'foto' => $imagePath,
            ]
        );

        session()->flash('message', [
            'type' => 'success', // Jenis pesan (success, warning, error)
            'text' => 'Data industri berhasil disimpan.'
        ]);

        return redirect()->route('industri');
    }

    public function render()
    {
        return view('livewire.industri.form');
    }
}
