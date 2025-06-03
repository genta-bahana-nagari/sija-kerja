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
    public $alreadyExists = false;

    public function mount($id = null)
    {
        // Cegah user yang sudah punya data Siswa membuat entri baru
        $existingSiswa = Auth::user()->siswa;

        if (!$id && $existingSiswa) {
            // Tandai bahwa user sudah punya data siswa, jangan abort langsung
            $this->alreadyExists = true;
            return;
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,bmp,webp', 
            'status_pkl' => 'required|in:0,1',
        ];
    }

    public function save()
    {
        $this->validate();

        $this->status_pkl = 0;

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
            'status_pkl' => (int) $this->status_pkl,  // Pastikan status_pkl otomatis '0'
        ];

        // Tambahkan user_id jika ini insert baru atau jika user_id belum ada pada data yang sedang diedit
        if (!$this->id) {
            // Jika belum ada id, artinya ini adalah insert baru
            $data['user_id'] = auth()->id();
        } else {
            // Jika sudah ada id, periksa apakah user_id sudah terisi
            $siswa = Siswa::find($this->id);
            if (!$siswa->user_id) {
                // Jika user_id masih kosong, set user_id ke auth()->id()
                $data['user_id'] = auth()->id();
            }
        }

        Siswa::updateOrCreate(
            ['id' => $this->id],
            $data
        );

        session()->flash('message', [
            'type' => 'success',
            'text' => 'Data siswa berhasil disimpan.'
        ]);
        return redirect()->route('siswa');
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}