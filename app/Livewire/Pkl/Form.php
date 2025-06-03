<?php

namespace App\Livewire\Pkl;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\PKL;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class Form extends Component
{
    public $id, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;
    public $pklList = [];
    public $siswaList = [];
    public $industriList = [];
    public $guruList = [];
    public $userMail;
    public $alreadyExists = false;  // New property to check if PKL exists for the student

    public function mount($id = null)
    {
        $this->userMail = Auth::user()->email;

        $this->pklList = PKL::all();
        $this->siswaList = Siswa::all();
        $this->industriList = Industri::all();
        $this->guruList = Guru::all();

        // Ambil siswa login
        $siswa = Siswa::where('email', $this->userMail)->first();
        if ($siswa) {
            $this->siswa_id = $siswa->id;
        }

        if ($id) {
            // Edit mode
            $pkl = PKL::findOrFail($id);
            $this->id = $pkl->id;
            $this->siswa_id = $pkl->siswa_id;
            $this->industri_id = $pkl->industri_id;
            $this->guru_id = $pkl->guru_id;
            $this->mulai = $pkl->mulai;
            $this->selesai = $pkl->selesai;
            $this->alreadyExists = false; // allow editing
        } else {
            // Create mode - check if already exists
            $this->alreadyExists = PKL::where('siswa_id', $this->siswa_id)->exists();
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

        // If already has a PKL record, prevent creating a new one
        if ($this->alreadyExists && !$this->id) {
            session()->flash('message', [
                'type' => 'warning',
                'text' => 'Anda sudah pernah lapor PKL.'
            ]);
            return redirect()->route('pkl');
        }
        
        // Durasi PKL minimal 3 bulan
        $start = Carbon::parse($this->mulai);
        $end = Carbon::parse($this->selesai);
        $diffInMonths = $start->diffInMonths($end);

        if ($diffInMonths < 3) {
            // session()->flash('message', 'Durasi PKL minimal 3 bulan, silakan ulangi.');
            session()->flash('message', [
                'type' => 'warning',
                'text' => 'Durasi PKL minimal 3 bulan, silakan ulangi.'
            ]);
            return redirect()->route('pkl.create');
        }

        DB::beginTransaction();

        try {
            // Temukan siswa berdasarkan email user yang login
            $siswa = Siswa::where('email', $this->userMail)->first();

            // Cek jika siswa ditemukan dan sudah punya laporan PKL
            if ($siswa && PKL::where('siswa_id', $siswa->id)->exists() && !$this->id) {
                DB::rollBack();
                session()->flash('message', [
                    'type' => 'error',
                    'text' => 'Anda sudah pernah lapor PKL.'
                ]);
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
            session()->flash('message', [
                'type' => 'success',
                'text' => 'Laporan PKL berhasil disimpan.'
            ]);

            return redirect()->route('pkl');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Terjadi kesalahan teknis, silakan ulangi.'
            ]);
            return redirect()->route('pkl');
        }
    }

    public function render()
    {
        $siswa_login = Siswa::where('email', '=', $this->userMail)->first();

        return view('livewire.pkl.form', [
            'siswa_login'=>$siswa_login,
            'alreadyExists' => $this->alreadyExists, // Pass the value to the view
        ]);
    }
}
