<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data form ke session untuk flash message
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('role', $request->role);
        Session::flash('password', $request->password);
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:penyedia,pelamar'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect(route('admin-kelolaPengguna'))->with('success', 'Data pengguna berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|in:pelamar,penyedia', 
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email harus berupa email yang valid!',
            'role.required' => 'Role harus diisi!',
            'role.in' => 'Role harus salah satu antara pelamar atau penyedia!',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
        User::where('id', $id)->update($data);

        return redirect()->route('admin-kelolaPengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin-kelolaPengguna')->with('success', 'Data pengguna berhasil dihapus.');
    }

    public function kelolaLowonganAdmin(string $id = null)
    {
        $pekerjaan = $id
        ? JobPost::where('id', $id)
                ->with('ratings')  
                ->first()
        : null;

        
        $daftarPekerjaan = JobPost::with('ratings')
        ->paginate(3);

        $daftarPekerjaan2 = JobPost::all();

        if($pekerjaan){
            $pekerjaan->average_rating = $pekerjaan->ratings->avg('rating_score') ?? 0;
        }

        $totalLowongan = $daftarPekerjaan2->count();

        return view('admin.kelolaLowonganAdmin', [
            'daftarPekerjaan' => $daftarPekerjaan,
            'daftarPekerjaan2' => $daftarPekerjaan2,
            'pekerjaan' => $pekerjaan,
            'totalLowongan' => $totalLowongan,
        ]);
    }

    public function editLowongan(string $id)
    {
        $pekerjaan = JobPost::where('id', $id)->first();
        return view('admin.editLowonga', [
            'pekerjaan' => $pekerjaan,
        ]);
    }

    public function updateLowongan(Request $request, string $id)
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
        ];

        JobPost::where('id', $id)->update($data);
        return redirect()->route('admin-kelolaLowongan')->with('success', 'Lowongan berhasil diperbarui.');;
    }

    public function hapusLowongan(string $id) {
        JobPost::where('id', $id)->delete();
        return redirect()->route('admin-kelolaLowongan')->with('success', 'Lowongan berhasil dihapus.');
    }

    public function kelolaPelamar()
    {

        $daftarpekerjaan = JobPost::whereHas('applicant', function ($query) {
            $query->whereColumn('job_posts.id', 'applicants.pekerjaan_id');
        })->paginate(3);

        $applicants = Applicant::whereIn('pekerjaan_id', $daftarpekerjaan->pluck('id'))
            ->with(['user.profile'])
            ->get();

        $totalLowongan = $applicants->count();
        $lowonganDiterima = $applicants->where('status', 'accepted')->count();
        $lowonganDitolak = $applicants->where('status', 'rejected')->count();

        return view('admin.kelolaPelamarAdmin', compact(
            'daftarpekerjaan',
            'applicants',
            'totalLowongan',
            'lowonganDiterima',
            'lowonganDitolak'
        ));
    }

    public function kelolaPengguna(){
        $users = User::paginate(4);

        $totalUser = $users->count();
        $totalAdmin = $users->where('role', 'admin')->count();
        $totalPelamar = $users->where('role', 'pelamar')->count();
        $totalPenyedia = $users->where('role', 'penyedia')->count();

        return view('admin.kelolaPengguna', [
            'users' => $users,
            'totalUser' => $totalUser,
            'totalPelamar' => $totalPelamar,
            'totalPenyedia' => $totalPenyedia,
            'totalAdmin' => $totalAdmin,
        ]);
    }
}
