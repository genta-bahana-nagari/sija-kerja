<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];

    public function industri()
    {
        return $this->hasMany(Industri::class);
    }
    
    public function pkl()
    {
        return $this->hasMany(PKL::class);
    }
}
