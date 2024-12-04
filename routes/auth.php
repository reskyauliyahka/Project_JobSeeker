<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\AplicantController;
use App\Http\Controllers\RatingController;
use App\Models\JobPost;
// use App\Models\Rating;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

    // Route::resource('/penyedia', JobPostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Penyedia
    Route::get('/penyedia/cari-lowongan/{id?}', [JobPostController::class, 'kelolaLowongan'])
    ->name('kelolaLowongan')
    ->middleware('employer');


    Route::resource('/penyedia', JobPostController::class)
    ->middleware('employer');

    Route::get('/penyedia/editUser/{id}', [JobPostController::class, 'editUser'])
    ->name('editUserPenyedia')
    ->middleware('employer');

    Route::put('/penyedia/updateUser/{id}', [JobPostController::class, 'UpdateUser'])
    ->name('updateUserPenyedia')
    ->middleware('employer');

    // Route untuk menampilkan semua pelamar
    Route::get('/applicants2', [AplicantController::class, 'showApplicants2'])
    ->name('applicants.index2')
    ->middleware('employer');

    // Pelamar
    Route::get('/pelamar/cari-lowongan/{id?}', [PelamarController::class, 'cariLowonganPelamar'])
    ->name('cariLowonganPelamar')
    ->middleware('job_seeker');

    Route::get('/pelamar/editUser/{id}', [PelamarController::class, 'editUser'])
    ->name('editUser')
    ->middleware('job_seeker');

    Route::put('/pelamar/updateUser/{id}', [PelamarController::class, 'UpdateUser'])
    ->name('updateUser')
    ->middleware('job_seeker');

    Route::resource('/pelamar', PelamarController::class)
    ->middleware('job_seeker');

    Route::get('/pelamar/{id}', [PelamarController::class, 'show'])
    ->name('pelamar.show')
    ->middleware('job_seeker');

    // Daftar Pelamar

    Route::post('/apply/{pekerjaan_id}', [AplicantController::class, 'store'])
    ->name('apply-job');

    // Route untuk menampilkan semua pelamar
    Route::get('/applicants2', [AplicantController::class, 'showApplicants2'])
    ->name('applicants.index2')
    ->middleware('employer');
    
    // Route::get('/applicants', [AplicantController::class, 'showApplicants'])
    // ->name('applicants.index')
    // ->middleware('auth');


    // Route untuk memperbarui status pelamar
    Route::post('/applicants/{applicant}/update-status', [AplicantController::class, 'updateStatus'])
    ->name('applicant.updateStatus')
    ->middleware('employer');


    Route::get('/pelamar/{id}/pekerjaan-dilamar', [PelamarController::class, 'showAppliedJobs'])
    ->name('pelamar.appliedJobs')
    ->middleware('job_seeker');

    Route::post('/pelamar/rating/{pekerjaan_id}', [RatingController::class, 'store'])
    ->name('pelamar-rating')
    ->middleware('job_seeker');

    
    Route::get('adminRegister', [RegisteredUserController::class, 'create'])
        ->name('adminRegister')
        ->middleware('admin');

    Route::get('/admin/kelolaLowongan/{id?}', [AdminController::class , 'kelolaLowonganAdmin'])
    ->name('admin-kelolaLowongan')
    ->middleware('admin');

    Route::get('/admin/editLowongan/{id}', [AdminController::class , 'editLowongan'])
    ->name('admin-editLowongan')
    ->middleware('admin');

    Route::put('/admin/updateLowongan/{id}', [AdminController::class , 'updateLowongan'])
    ->name('admin-updateLowongan')
    ->middleware('admin');

    Route::put('/admin/updateLowongan/{id}', [AdminController::class , 'updateLowongan'])
    ->name('admin-updateLowongan')
    ->middleware('admin');

    Route::delete('/admin/deleteLowongan/{id}', [AdminController::class, 'hapusLowongan'])
    ->name('admin-hapusLowongan')
    ->middleware('admin');

    Route::get('/admin/kelolaPengguna', [AdminController::class, 'kelolaPengguna'])
    ->name('admin-kelolaPengguna')
    ->middleware('admin');
    // Route::put('/admin/kelolaPengguna/{id)', [AdminController::class, 'update'])->name('admin.kelolaPengguna');
    Route::get('/admin/kelolaPelamar', [AdminController::class, 'kelolaPelamar'])
    ->name('admin-kelolaPelamar')
    ->middleware('admin');

    Route::resource('/admin', AdminController::class)->middleware('admin');



});
