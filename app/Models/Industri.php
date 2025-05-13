<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;
    protected $table = 'industri';

    protected $fillable = ['nama', 'bidang_usaha', 'alamat', 'kontak', 'email', 'guru_pembimbing', 'website', 'foto'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_pembimbing');
    }
    
    public function pkl()
    {
        return $this->hasMany(PKL::class);
    }
}
