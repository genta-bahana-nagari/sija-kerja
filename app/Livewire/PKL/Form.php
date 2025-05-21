<?php

namespace App\Livewire\PKL;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\PKL;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
    public $id, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;
    public $pklList = [];
    public $siswaList = [];
    public $industriList = [];
    public $guruList = [];
    public $userMail;

    public function mount($id = null)
    {
        $this->userMail = Auth::user()->email;

        $this->pklList = PKL::all();
        $this->siswaList = Siswa::all();
        $this->industriList = Industri::all();
        $this->guruList = Guru::all();

        // Ambil siswa yang sedang login
        $siswa = Siswa::where('email', $this->userMail)->first();
        if ($siswa) {
            $this->siswa_id = $siswa->id;
        }

        if ($id) {
            $pkl = PKL::findOrFail($id);
            $this->id = $pkl->id;
            $this->siswa_id = $pkl->siswa_id;
            $this->industri_id = $pkl->industri_id;
            $this->guru_id = $pkl->guru_id;
            $this->mulai = $pkl->mulai;
            $this->selesai = $pkl->selesai;
        }
    }

    public function rules()
    {
        return [
            'siswa_id' => 'required|exists:siswa,id',
            'industri_id' => 'required|exists:industri,id',
            'guru_id' => 'required|exists:guru,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ];
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            // Temukan siswa berdasarkan email user yang login
            $siswa = Siswa::where('email', $this->userMail)->first();

            // Cek jika siswa ditemukan dan sudah punya laporan PKL
            if ($siswa && PKL::where('siswa_id', $siswa->id)->exists()) {
                DB::rollBack();
                session()->flash('message', 'Input dibatalkan: Anda sudah pernah melaporkan PKL.');
                return redirect()->route('pkl');
            }

            PKL::updateOrCreate(
                ['id' => $this->id],
                [
                    'siswa_id' => $this->siswa_id,
                    'industri_id' => $this->industri_id,
                    'guru_id' => $this->guru_id,
                    'mulai' => $this->mulai,
                    'selesai' => $this->selesai,
                ]
            );

            DB::commit();
            session()->flash('message', 'Laporan PKL berhasil disimpan.');

            return redirect()->route('pkl');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pkl')->with('error', 'Terjadi kesalahan teknis, silakan ulangi.');
        }
    }

    public function render()
    {
        $siswa_login = Siswa::where('email', '=', $this->userMail)->first();

        return view('livewire.pkl.form', [
            'siswa_login'=>$siswa_login,
        ]);
    }
}