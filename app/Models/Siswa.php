<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $fillable = ['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'foto', 'status_pkl', 'user_id'];
    
    public function pkl()
    {
        return $this->hasOne(PKL::class);
    }

    // Accessor untuk keterangan gender
    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS gender", [$this->gender])->gender ?? '-';
    }

    // Accessor untuk keterangan status PKL
    public function getKetStatusPKLAttribute()
    {
        return $this->status_pkl ? 'Sudah Lapor PKL' : 'Belum Lapor PKL';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
