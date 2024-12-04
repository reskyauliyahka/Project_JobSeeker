<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role === 'penyedia') {
            return redirect()->route('penyedia.index');
        }
    
        if (Auth::user()->role === 'pelamar') {
                // Cek apakah profil pelamar sudah ada dan lengkap
            $profile = Profile::where('pelamar_id', Auth::id())->first();

            if (!$profile) {
                return redirect()->route('pelamar.create')
                    ->with('message', 'Silakan lengkapi profil Anda terlebih dahulu.');
            }
            return redirect()->route('pelamar.index');
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.index');
        }

        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
