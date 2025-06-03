<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Guru; // Untuk cek email guru
use App\Models\Siswa; // Untuk cek email siswa
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';
    
    public string $role = '';

    public string $password_confirmation = '';

    public $emailError = null; // Variabel public untuk menyimpan pesan error email

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $this->emailError = null; // Reset error email sebelum validasi

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Cek apakah email sudah terdaftar di tabel siswa atau guru
        if (Siswa::where('email', $this->email)->exists()) {
            $this->role = 'Siswa'; // Menetapkan role siswa jika email ditemukan di tabel siswa
        } elseif (Guru::where('email', $this->email)->exists()) {
            $this->role = 'Guru'; // Menetapkan role guru jika email ditemukan di tabel guru
        } else {
            // Jika email tidak terdaftar di tabel siswa atau guru
            $this->emailError = 'Email ini tidak terdaftar di sistem kami';
            return; // Jangan lanjutkan registrasi jika email tidak ditemukan
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        // Menambahkan role ke pengguna yang baru dibuat
        $user->assignRole($this->role);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
