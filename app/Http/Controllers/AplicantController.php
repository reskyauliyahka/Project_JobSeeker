<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AplicantController extends Controller
{
    public function store(Request $request, $pekerjaan_id)
    {   
        $pelamarId = Auth::id();

        // cek pelamar
        $existingApplication = Applicant::where('pekerjaan_id', $pekerjaan_id)
            ->where('pelamar_id', $pelamarId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->withErrors(['Anda sudah melamar pekerjaan ini.']);
        }

        
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', 
            'resume_file' => 'nullable',
        ]);

        
        $resumeFile = $request->file('cv');
        $applicant = Applicant::create([
            'pelamar_id' => Auth::user()->id,
            'pekerjaan_id' => $pekerjaan_id, 
            'resume_file' => $resumeFile,
            'waktuLamaran' => now(),
        ]);

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim!');
    }

    public function updateStatus($applicant_id, Request $request)
    {
        
        $validated = $request->validate([
            'status' => 'required|in:accepted,rejected'
        ]);

        $applicant = Applicant::findOrFail($applicant_id);

        $applicant->status = $validated['status'];
        $applicant->save();

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin-kelolaPelamar') 
                            ->with('success', 'Status pelamar berhasil diubah.');
        } elseif (Auth::user()->role == 'penyedia') {
            return redirect()->route('applicants.index2', ['pekerjaan_id' => $applicant->pekerjaan_id])
                            ->with('success', 'Status pelamar berhasil diubah.');
        }

    }

    // public function showApplicants()
    // {
    //     $pekerjaan = JobPost::where('penyedia_id', Auth::id())
    //     ->whereHas('applicant' , function ($query) {
    //         $query->whereColumn('job_posts.id', 'applicants.pekerjaan_id');
    //     })
    //     ->get();

    //     $applicants = Applicant::whereIn('pekerjaan_id', $pekerjaan->pluck('id'))
    //     ->with(['user.profile']) 
    //     ->get();


    //     return view('penyedia.applicant', compact('pekerjaan', 'applicants'));
    // }

    public function showApplicants2()
    {
        // lowongan penyedia yang memiliki pelamar
        $daftarpekerjaan = JobPost::where('penyedia_id', Auth::id())
        ->whereHas('applicant', function ($query) {
            $query->whereColumn('job_posts.id', 'applicants.pekerjaan_id');
        })
        ->paginate(3); 

        // Ambil data pelamar berdasarkan pekerjaan yang sudah diambil
        $applicants = Applicant::whereIn('pekerjaan_id', $daftarpekerjaan->pluck('id'))
            ->with(['user.profile'])
            ->get();

        $totalLowongan = $applicants->count();
        $lowonganDiterima = $applicants->where('status', 'accepted')->count();
        $lowonganDitolak = $applicants->where('status', 'rejected')->count();

        return view('penyedia.aplicant2', compact(
            'daftarpekerjaan',
            'applicants',
            'totalLowongan',
            'lowonganDiterima',
            'lowonganDitolak'
        ));
    }
    
}

