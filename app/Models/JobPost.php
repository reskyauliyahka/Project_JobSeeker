<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'penyedia_id', 
        'pekerjaan', 
        'lokasi', 
        'typePekerjaan', 
        'kontak', 
        'rentangGaji', 
        'syaratPekerjaan',
        'logo',
        'perusahaan',
        'jenjangKarir',
        'deskripsi',
        'fungsi',
    ];

    public function user() {
        return $this->belongsTo(User::class)->where('role', 'penyedia');
    }

    public function applicant() {
        return $this->hasMany(Applicant::class, 'pekerjaan_id');
    }

    public function ratings() {
        return $this->hasMany(Rating::class, 'pekerjaan_id');
    }
}
