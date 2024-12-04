<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarPekerjaan = JobPost::where('penyedia_id', Auth::id())->get();
        return view('penyedia.index', [
            'daftarPekerjaan' => $daftarPekerjaan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Simpan data form ke session untuk flash message
        Session::flash('pekerjaan', $request->pekerjaan);
        Session::flash('lokasi', $request->lokasi);
        Session::flash('typePekerjaan', $request->typePekerjaan);
        Session::flash('kontak', $request->kontak);
        Session::flash('rentangGaji', $request->rentangGaji);
        Session::flash('syaratPekerjaan', $request->syaratPekerjaan);
        Session::flash('perusahaan', $request->perusahaan);
        Session::flash('jenjangKarir', $request->jenjangKarir);
        Session::flash('fungsi', $request->fungsi);
        Session::flash('deskripsi', $request->deskripsi);

        // Validasi input
        $request->validate([
            'pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'typePekerjaan' => 'required|in:full-time,part-time,freelance',
            'kontak' => 'required|email',
            'rentangGaji' => 'required|string|max:255',
            'syaratPekerjaan' => 'required|string',
            'perusahaan' => 'required|string|max:255',
            'jenjangKarir' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file logo
        ], [
            // Custom error messages
            'pekerjaan.required' => 'Nama Pekerjaan harus diisi!',
            'lokasi.required' => 'Lokasi harus diisi!',
            'typePekerjaan.required' => 'Tipe pekerjaan harus diisi!',
            'kontak.required' => 'Kontak harus diisi!',
            'kontak.email' => 'Kontak harus berupa email yang valid!',
            'rentangGaji.required' => 'Rentang Gaji harus diisi!',
            'syaratPekerjaan.required' => 'Syarat pekerjaan harus diisi!',
            'perusahaan.required' => 'Nama perusahaan harus diisi!',
            'jenjangKarir.required' => 'Jenjang karir harus diisi!',
            'fungsi.required' => 'Fungsi pekerjaan harus diisi!',
            'deskripsi.required' => 'Deskripsi pekerjaan harus diisi!',
            'logo.image' => 'Logo harus berupa gambar!',
            'logo.mimes' => 'Logo hanya boleh berformat jpg, jpeg, atau png!',
            'logo.max' => 'Ukuran Logo maksimal 2MB!',
        ]);

        // Upload file logo jika ada
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Simpan data ke database
        JobPost::create([
            'penyedia_id' => Auth::user()->id,
            'pekerjaan' => $request->pekerjaan,
            'lokasi' => $request->lokasi,
            'typePekerjaan' => $request->typePekerjaan,
            'kontak' => $request->kontak,
            'rentangGaji' => $request->rentangGaji,
            'syaratPekerjaan' => $request->syaratPekerjaan,
            'perusahaan' => $request->perusahaan,
            'jenjangKarir' => $request->jenjangKarir,
            'fungsi' => $request->fungsi,
            'deskripsi' => $request->deskripsi,
            'logo' => $logoPath,
        ]);


        // Redirect ke halaman penyedia dengan pesan sukses
        return redirect()->route('kelolaLowongan')->with('success', 'Lowongan berhasil ditambahkan.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pekerjaan = JobPost::where('id', $id)->first();
        return view('penyedia.detail', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = JobPost::where('id', $id)->first();
        return view('penyedia.edit', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pekerjaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'typePekerjaan' => 'required|in:full-time,part-time,freelance',
            'kontak' => 'required|email',
            'rentangGaji' => 'required|string|max:255',
            'syaratPekerjaan' => 'required|string',
            'perusahaan' => 'required|string|max:255',
            'jenjangKarir' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ], [
            // Custom error messages
            'pekerjaan.required' => 'Nama Pekerjaan harus diisi!',
            'lokasi.required' => 'Lokasi harus diisi!',
            'typePekerjaan.required' => 'Tipe pekerjaan harus diisi!',
            'kontak.required' => 'Kontak harus diisi!',
            'kontak.email' => 'Kontak harus berupa email yang valid!',
            'rentangGaji.required' => 'Rentang Gaji harus diisi!',
            'syaratPekerjaan.required' => 'Syarat pekerjaan harus diisi!',
            'perusahaan.required' => 'Nama perusahaan harus diisi!',
            'jenjangKarir.required' => 'Jenjang karir harus diisi!',
            'fungsi.required' => 'Fungsi pekerjaan harus diisi!',
            'deskripsi.required' => 'Deskripsi pekerjaan harus diisi!',
        ]);
        
        $pekerjaan = JobPost::where('id', $id)->first();
        
        if ($request->hasFile('logo')) {
            
            if ($pekerjaan && $pekerjaan->logo && file_exists(storage_path('app/public/' . $pekerjaan->logo))) {
                unlink(storage_path('app/public/' . $pekerjaan->logo)); // Hapus file logo lama
            }
        
            $logo = $request->file('logo')->store('logos', 'public'); // Simpan logo baru
        } else {
            
            $logo = $pekerjaan->logo ?? null;
        }
        
        $data = [
            'pekerjaan' => $request->pekerjaan,
            'lokasi' => $request->lokasi,
            'typePekerjaan' => $request->typePekerjaan,
            'kontak' => $request->kontak,
            'rentangGaji' => $request->rentangGaji,
            'syaratPekerjaan' => $request->syaratPekerjaan,
            'perusahaan' => $request->perusahaan,
            'jenjangKarir' => $request->jenjangKarir,
            'fungsi' => $request->fungsi,
            'deskripsi' => $request->deskripsi,
            'logo' => $logo, // Menggunakan logo baru atau tetap dengan logo lama
        ];
        
        JobPost::where('id', $id)->update($data);
        
        return redirect()->route('kelolaLowongan')->with('success', 'Lowongan berhasil diperbarui.');;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JobPost::where('id', $id)->delete();
        return redirect()->route('kelolaLowongan')->with('success', 'Lowongan berhasil dihapus.');
    }


    public function kelolaLowongan(string $id = null)
    {
        $pekerjaan = $id
        ? JobPost::where('id', $id)
                ->where('penyedia_id', Auth::id())
                ->with('ratings')  
                ->first()
        : null;

        $daftarPekerjaan2 = JobPost::where('penyedia_id', Auth::id())->get();
        // Ambil semua pekerjaan yang dimiliki penyedia
        $daftarPekerjaan = JobPost::where('penyedia_id', Auth::id())
        ->with('ratings')
        ->paginate(3); 

        if($pekerjaan){
            $pekerjaan->average_rating = $pekerjaan->ratings->avg('rating_score') ?? 0;
        }

        $totalLowongan = $daftarPekerjaan2->count();

        // Return view dengan data pekerjaan dan daftar pekerjaan
        return view('penyedia.kelolaLowongan', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'daftarPekerjaan2' => $daftarPekerjaan2,
            'pekerjaan' => $pekerjaan,
            'totalLowongan' => $totalLowongan,
        ]);
    }

    public function editUser(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('penyedia.editUserPenyedia', [
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

        return redirect()->route('penyedia.index')->with('success', 'Data pengguna berhasil diperbarui.');

    }

}
