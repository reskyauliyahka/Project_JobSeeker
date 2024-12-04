<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'pekerjaan_id', 
        'pelamar_id', 
        'rating_score', 
        'ulasan', 
        'waktu_ulasan'
    ];

    public function jobPosts() {
        return $this->belongsTo(JobPost::class, 'pekerjaan_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'pelamar_id');
    }
}
