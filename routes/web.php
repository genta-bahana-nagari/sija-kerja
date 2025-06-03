<?php

use App\Livewire\Guru\Form as GuruForm;
use App\Livewire\Guru\View as GuruView;
use App\Livewire\Industri\Form as IndustriForm;
use App\Livewire\Industri\View as IndustriView;
use App\Livewire\Pkl\Form as PKLForm;
use App\Livewire\Pkl\View as PKLView;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Siswa\Form;
use App\Livewire\Siswa\View;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'check.roles'])
    ->name('dashboard');

Route::view('siswa', 'siswa')
    ->middleware(['auth', 'verified', 'check.roles'])
    ->name('siswa');

Route::view('guru', 'guru')
    ->middleware(['auth', 'verified', 'check.roles'])
    ->name('guru');

Route::view('industri', 'industri')
    ->middleware(['auth', 'verified', 'check.roles'])
    ->name('industri');

Route::view('pkl', 'pkl')
    ->middleware(['auth', 'verified', 'check.roles'])
    ->name('pkl');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // CRUD Siswa Livewire
    Route::get('/siswa/show/{id}', View::class)->name('siswa.show');
    Route::get('/siswa/create', Form::class)->name('siswa.create');
    Route::get('/siswa/edit/{id}', Form::class)->name('siswa.edit');
   
    // CRUD Guru Livewire
    Route::get('/guru/show/{id}', GuruView::class)->name('guru.show');
    Route::get('/guru/create', GuruForm::class)->name('guru.create');
    Route::get('/guru/edit/{id}', GuruForm::class)->name('guru.edit');
    
    // CRUD Industri Livewire
    Route::get('/industri/show/{id}', IndustriView::class)->name('industri.show');
    Route::get('/industri/create', IndustriForm::class)->name('industri.create');
    Route::get('/industri/edit/{id}', IndustriForm::class)->name('industri.edit');
    
    // CRUD PKL Livewire
    Route::get('/pkl/show/{id}', PKLView::class)->name('pkl.show');
    Route::get('/pkl/create', PKLForm::class)->name('pkl.create');
    Route::get('/pkl/edit/{id}', PKLForm::class)->name('pkl.edit');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
