<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pelamar.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $pekerjaan_id)
    {
        Session::flash('rating_score', $request->rating_score);
        Session::flash('ulasan', $request->ulasan);

        $request->validate([
            'rating_score' => 'required|integer',
            'ulasan' => 'nullable|string',
        ], [
            'rating_score' => 'Rating harus diisi!',
        ]);

        $data = [
            'pelamar_id' => Auth::user()->id,
            'pekerjaan_id' => $pekerjaan_id,
            'rating_score' => $request->rating_score,
            'ulasan' => $request->ulasan,
            'waktu_ulasan' => $request->jenis_kelamin,
    
        ];

        Rating::create($data);

        return redirect()->back()->with('success', 'Rating berhasil dikirim!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
