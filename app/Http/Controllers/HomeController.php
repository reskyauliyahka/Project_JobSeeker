<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\JobPost;
use App\Models\Rating;
use App\Models\Profile;

class HomeController extends Controller
{

    
    public function index2(Request $request)
    {
        
        $search = $request->input('search');
        $kategori = $request->input('pekerjaan');

        
        $daftarPekerjaan = JobPost::when($kategori, function ($query, $kategori) {
            return $query->where('pekerjaan', $kategori); 
        })
        ->when($search, function ($query, $search) {
            return $query->where('pekerjaan', 'like', "%{$search}%")
                         ->orWhere('perusahaan', 'like', "%{$search}%")
                         ->orWhere('lokasi', 'like', "%{$search}%")
                         ->orWhere('typePekerjaan', 'like', "%{$search}%")
                         ->orWhere('kontak', 'like', "%{$search}%")
                         ->orWhere('rentangGaji', 'like', "%{$search}%")
                         ->orWhere('syaratPekerjaan', 'like', "%{$search}%")
                         ->orWhere('fungsi', 'like', "%{$search}%")
                         ->orWhere('jenjangKarir', 'like', "%{$search}%")
                         ->orWhere('deskripsi', 'like', "%{$search}%");
        })  
        ->get();

        // Ambil opsi kategori unik untuk filter dropdown
        $kategoriOptions = JobPost::select('pekerjaan')->distinct()->pluck('pekerjaan');
        return view('master', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'kategoriOptions' => $kategoriOptions,
        ]);
    }


    public function cariLowongan(Request $request, string $id = null)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');
        $lokasi = $request->input('lokasi');
        $type_pekerjaan = $request->input('type_pekerjaan');
        $rentangGaji = $request->input('rentangGaji');

        $pekerjaan = $id ? JobPost::with('ratings')->find($id) : null;

        $daftarPekerjaan = JobPost::when($kategori, function ($query, $kategori) {
                    return $query->where('pekerjaan', $kategori);
                })
                ->when($lokasi, function ($query, $lokasi) {
                    return $query->where('lokasi', $lokasi);
                })
                ->when($type_pekerjaan, function ($query, $type_pekerjaan) {
                    return $query->where('typePekerjaan', $type_pekerjaan);
                })
                ->when($rentangGaji, function ($query, $rentangGaji) {
                    return $query->where('rentangGaji', $rentangGaji);
                })
                ->when($search, function ($query, $search) {
                    return $query->where('pekerjaan', 'like', "%{$search}%")
                                 ->orWhere('perusahaan', 'like', "%{$search}%")
                                 ->orWhere('lokasi', 'like', "%{$search}%")
                                 ->orWhere('typePekerjaan', 'like', "%{$search}%")
                                 ->orWhere('kontak', 'like', "%{$search}%")
                                 ->orWhere('rentangGaji', 'like', "%{$search}%")
                                 ->orWhere('syaratPekerjaan', 'like', "%{$search}%")
                                 ->orWhere('fungsi', 'like', "%{$search}%")
                                 ->orWhere('jenjangKarir', 'like', "%{$search}%")
                                 ->orWhere('deskripsi', 'like', "%{$search}%");
                })  
                ->with('ratings')
                ->paginate(3);

        if ($pekerjaan) {
            $pekerjaan->average_rating = $pekerjaan?->ratings?->avg('rating_score') ?? 0;
        }
        
        $kategoriOptions = JobPost::select('pekerjaan')->distinct()->pluck('pekerjaan');
        $lokasiOptions = JobPost::select('lokasi')->distinct()->pluck('lokasi');
        $typeOptions = JobPost::select('typePekerjaan')->distinct()->pluck('typePekerjaan');
        $gajiOptions = JobPost::select('rentangGaji')->distinct()->pluck('rentangGaji');

        return view('cariLowongan', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'pekerjaan' => $pekerjaan,
            'kategoriOptions' => $kategoriOptions,
            'lokasiOptions' => $lokasiOptions,
            'typeOptions' => $typeOptions,
            'gajiOptions' => $gajiOptions,
        ]);
    }


}
