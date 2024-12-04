<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'pelamar_id', 
        'nama', 
        'kontak',  
        'umur', 
        'jenis_kelamin', 
        'deskripsi', 
        'noHp', 
        'foto_profil', 
        'alamat', 
        'jenjang', 
        'tglLahir',
    ];
    
    public function user() {
        return $this->belongsTo(User::class)->where('role', 'pelamar');
    }
}
