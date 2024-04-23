<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $albums = album::with('foto')->where('user_id', $user->id)->get();
        // dd($albums);
        return view('home.index', compact('albums', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createalbum(){
        return view('album.createalbum');
    } 


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
        ]);

        Album::create([
            'nama_album' => $validated['nama_album'],
            'deskripsi' => $validated['deskripsi'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('userprofile');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    $user = Auth::user();
        $album = album::with('fotos')->where('id', $user->id)->get();
        return view('album.showalbum', compact('album'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = album::with('foto')->where('id', $id)->get();
        return view('album.detail', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update( Request $request, $id){
        DB::beginTransaction();

        try {
            $album = album::with('foto')->findOrFail($id);
            $input = $request->all();

            $album->update([
                //sesuain sama fieldnya di
                //contoh
                // 'judul' => $input['judulBuku'],
                //pake ini $input[''];

            ]);

            DB::commit();
            
            return redirect()->route('index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            return back()->withInput()->with(['error' => "Terjadi error ketika memproses perintahmu. Tolong coba lagi."]);
        }
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $album = album::findOrFail($id);
            $fotos = foto::where('album_id', $album->id)->get();

            foreach ($fotos as $item) {
                $item->delete();
            }

            $album->delete();
            
            DB::commit();
            return redirect()->route('index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('An error occurred: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            return back()->withInput()->with(['error' => "Terjadi error ketika memproses perintahmu. Tolong coba lagi."]);
}
}
}