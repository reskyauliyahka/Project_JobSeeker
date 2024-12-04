<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostController;
use App\Models\JobPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;



// Route::get('/penyedia/home', [HomeController::class, 'index'])->name('home');
Route::get('/pelamar/home', [HomeController::class, 'index3'])->name('home2');
Route::get('/admin/home', [HomeController::class, 'index4'])->name('home3');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/password/change', [PasswordController::class, 'edit'])->name('password.change');
    Route::post('/password/change', [PasswordController::class, 'update'])->name('password.update');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index2'])->name('homeMaster');

Route::get('/show/{id}', [HomeController::class, 'show'])->name('detail');
Route::get('/show2/{id}', [HomeController::class, 'show2'])->name('detail2');
Route::get('/show3/{id}', [HomeController::class, 'show3'])->name('detail3');

Route::get('/show3/{id}', [HomeController::class, 'show3'])->name('detail3');

Route::get('/cari-lowongan/{id?}', [HomeController::class, 'cariLowongan'])->name('cariLowongan');


Route::get('/user-roles-data', function () {
    $rolesData = DB::table('users')
        ->select('role', DB::raw('count(*) as total'))
        ->whereIn('role', ['penyedia', 'pelamar'])
        ->groupBy('role')
        ->get();

    return response()->json($rolesData);
});

Route::get('/job-category-data', function () {
    // Ambil jumlah postingan berdasarkan kategori pekerjaan
    $categoriesData = DB::table('job_posts')
        ->select('pekerjaan', DB::raw('count(*) as total'))
        ->groupBy('pekerjaan')
        ->orderByDesc('total') // Urutkan berdasarkan jumlah terbanyak
        ->get();

    return response()->json($categoriesData);
});

Route::get('/applicant-status-data', function () {
    // Ambil jumlah pelamar berdasarkan status lamaran
    $statusData = DB::table('applicants')
        ->select('status', DB::raw('count(*) as total'))
        ->groupBy('status')
        ->get();

    return response()->json($statusData);
});

Route::get('/job-rating-data', function () {
    // Ambil rata-rata rating per pekerjaan, mengganti null dengan 0
    $ratingData = DB::table('job_posts')
        ->leftJoin('ratings', 'job_posts.id', '=', 'ratings.pekerjaan_id') // LEFT JOIN agar data pekerjaan tanpa rating tetap ada
        ->select('job_posts.pekerjaan', DB::raw('AVG(COALESCE(ratings.rating_score, 0)) as average_rating'))
        ->groupBy('job_posts.pekerjaan') // Kelompokkan berdasarkan pekerjaan
        ->orderByDesc('average_rating') // Urutkan berdasarkan rating tertinggi
        ->get();

    return response()->json($ratingData);
});



require __DIR__.'/auth.php';
