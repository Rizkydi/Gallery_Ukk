<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the komentar data
        $validatedData = $request->validate([
            'foto_id' => 'required|exists:fotos,id',
            'isi_komentar' => 'required',
        ]);
    
        // Create a new comment
        $komentar = new komentar();
        $komentar->foto_id = $validatedData['foto_id'];
        $komentar->user_id = auth()->id();
        $komentar->isi_komentar = $validatedData['isi_komentar'];
        $komentar->tanggal_komentar = now();
        $komentar->save();
        $komentar->created_at_formatted = Carbon::parse($komentar->created_at)->diffForHumans();
        // Return the komentar data as JSON
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(komentar $komentar)
    {
         // Pastikan bahwa pengguna yang mencoba menghapus komentar adalah pemilik komentar atau memiliki izin yang sesuai
    if ($komentar->user_id === auth()->id()) {
        $komentar->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    } else {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }
    }
}
