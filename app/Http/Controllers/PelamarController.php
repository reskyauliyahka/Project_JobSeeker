<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\JobPost;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        $kategoriOptions = JobPost::select('pekerjaan')->distinct()->pluck('pekerjaan');

        $avgRatings = Rating::with('jobPosts') 
            ->select('pekerjaan_id', DB::raw('AVG(rating_score) as avg_rating'))
            ->groupBy('pekerjaan_id')
            ->orderByDesc('avg_rating')
            ->limit(3)
            ->get();

        $profile = Profile::where('pelamar_id', Auth::id())->first();

        return view('pelamar.home', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'kategoriOptions' => $kategoriOptions,
            'avgRatings' => $avgRatings,
            'profile' => $profile,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('kontak', $request->kontak);
        Session::flash('umur', $request->umur);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('noHp', $request->noHp);
        Session::flash('alamat', $request->alamat);
        Session::flash('jenjang', $request->jenjang);
        Session::flash('tglLahir', $request->tglLahir);

        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|in:Perempuan,Laki-laki',
            'kontak' => 'required|email',
            'deskripsi' => 'required|string|max:255',
            'noHp' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required|string|max:255',
            'jenjang' =>'required|string|max:255',
            'tglLahir' =>'required|date',

        ], [
            'nama.required' => 'Nama harus diisi!',
            'umur.required' => 'Umur harus diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi!',
            'kontak.required' => 'Kontak harus diisi!',
            'kontak.email' => 'Kontak harus berupa email yang valid!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
            'foto_profil.image' => 'Foto profil harus berupa gambar!',
            'foto_profil.mimes' => 'Foto profil hanya boleh berformat jpg, jpeg, atau png!',
            'foto_profil.max' => 'Ukuran foto profil maksimal 2MB!',
            'alamat.required' => 'alamat harus diisi!',
            'jenjang.required' => 'jenjang harus diisi!',
            'tglLahir.required' => 'tglLahir harus diisi!',

        ]);

        $path = null;
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('profile_photos', 'public');
        }

        $data = [
            'pelamar_id' => Auth::user()->id,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'deskripsi' => $request->deskripsi,
            'noHp' => $request->noHp,
            'foto_profil' => $path,
            'alamat' => $request->alamat,
            'jenjang' => $request->jenjang,
            'tglLahir' => $request->tglLahir,
        ];

        Profile::create($data);

        return redirect()->to('/pelamar')->with('success', 'Data Pelamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::where('pelamar_id', $id)->first();

        return view('pelamar.detail', [
            'profile' => $profile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::where('pelamar_id', $id)->first();
        return view('pelamar.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|in:Perempuan,Laki-laki',
            'kontak' => 'required|email',
            'deskripsi' => 'required|string|max:255',
            'noHp' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required|string|max:255',
            'jenjang' =>'required|string|max:255',
            'tglLahir' =>'required|date',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'umur.required' => 'Umur harus diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin harus diisi!',
            'kontak.required' => 'Kontak harus diisi!',
            'kontak.email' => 'Kontak harus berupa email yang valid!',
            'deskripsi.required' => 'Deskripsi harus diisi!',
            'foto_profil.image' => 'Foto profil harus berupa gambar!',
            'foto_profil.mimes' => 'Foto profil hanya boleh berformat jpg, jpeg, atau png!',
            'foto_profil.max' => 'Ukuran foto profil maksimal 2MB!',
            'alamat.required' => 'alamat harus diisi!',
            'jenjang.required' => 'jenjang harus diisi!',
            'tglLahir.required' => 'tglLahir harus diisi!',
        ]);
        
        $pelamar = Profile::where('pelamar_id', $id)->first();
        
        if ($request->hasFile('foto_profil')) {
            
            if ($pelamar && $pelamar->foto_profil && file_exists(storage_path('app/public/' . $pelamar->foto_profil))) {
                unlink(storage_path('app/public/' . $pelamar->foto_profil));
            }
            
            $fotoProfilPath = $request->file('foto_profil')->store('profile_photos', 'public');
        }
        else {   
            $fotoProfilPath = $pelamar->foto_profil ?? null;
        }

        $data = [
            'pelamar_id' => Auth::user()->id,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'deskripsi' => $request->deskripsi,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'jenjang' => $request->jenjang,
            'tglLahir'=> $request->tglLahir,
            'foto_profil' => $fotoProfilPath,
        ];
        
        Profile::where('pelamar_id', $id)->update($data);
        
        return redirect()->route('pelamar.show', ['id' => Auth::id()])->with('success', 'Data Pelamar berhasil diperbarui.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAppliedJobs(string $id)
    {
        $profile = Profile::where('pelamar_id', $id)->first();

        $appliedJobs = Applicant::where('pelamar_id', $id)
                                ->with('jobPosts')  
                                ->get();

        $totalLowongan = $appliedJobs->count();
        $lowonganDiterima = $appliedJobs->where('status', 'accepted')->count();
        $lowonganDitolak = $appliedJobs->where('status', 'rejected')->count();


        return view('pelamar.aplied', [
            'profile' => $profile,
            'appliedJobs' => $appliedJobs,
            'totalLowongan' => $totalLowongan,
            'lowonganDiterima' => $lowonganDiterima,
            'lowonganDitolak' => $lowonganDitolak,
        ]);
    }

    public function cariLowonganPelamar(Request $request, string $id = null)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');
        $lokasi = $request->input('lokasi');
        $type_pekerjaan = $request->input('type_pekerjaan');
        $rentangGaji = $request->input('rentangGaji');

        $pekerjaan = $id ? JobPost::with('ratings')->find($id) : null;

        $daftarPekerjaan = JobPost::when($search, function ($query, $search) {
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
                ->when($kategori, function ($query, $kategori) {
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
                ->with('ratings')
                ->paginate(3);

        if ($pekerjaan) {
            $pekerjaan->average_rating = $pekerjaan?->ratings?->avg('rating_score') ?? 0;
        }
        
        $kategoriOptions = JobPost::select('pekerjaan')->distinct()->pluck('pekerjaan');
        $lokasiOptions = JobPost::select('lokasi')->distinct()->pluck('lokasi');
        $typeOptions = JobPost::select('typePekerjaan')->distinct()->pluck('typePekerjaan');
        $gajiOptions = JobPost::select('rentangGaji')->distinct()->pluck('rentangGaji');

        return view('pelamar.cariLowonganPelamar', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'pekerjaan' => $pekerjaan,
            'kategoriOptions' => $kategoriOptions,
            'lokasiOptions' => $lokasiOptions,
            'typeOptions' => $typeOptions,
            'gajiOptions' => $gajiOptions,
        ]);
    }


    public function editUser(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('pelamar.editUser', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email harus berupa email yang valid!',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        User::where('id', $id)->update($data);

        return redirect()->route('pelamar.show', ['id' => Auth::id()])->with('success', 'Data pengguna berhasil diperbarui.');

    }
    
    
    

}
