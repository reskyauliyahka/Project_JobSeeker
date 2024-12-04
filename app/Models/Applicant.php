<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'pelamar_id',
        'pekerjaan_id',
        'waktuLamaran',
        'status',
        'resume_file',
    ];

    // Handle file upload
    public static function uploadResume($file)
    {
        // Store the file in the 'resumes' directory
        return $file->store('resumes', 'public');
    }

    // Mutator to set the resume file when an applicant is created
    public function setResumeFileAttribute($value)
    {
        if (is_file($value)) {
            // If file is being uploaded, store it and set the file path
            $this->attributes['resume_file'] = self::uploadResume($value);
        }
    }

    // Optional: Add a method to update the applicant status
    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }


    public function user() {
        return $this->belongsTo(User::class, 'pelamar_id')->where('role', 'pelamar');
    }

    public function jobPosts(){
        return $this->belongsTo(JobPost::class,  'pekerjaan_id');
    }
}
