<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email', 'user_id'];

    public function industri()
    {
        return $this->hasMany(Industri::class, 'guru_pembimbing');
    }
    
    public function pkl()
    {
        return $this->hasMany(PKL::class);
    }

    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS gender", [$this->gender])->gender ?? '-';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
