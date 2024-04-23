<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use App\Models\album;
use App\Models\like_foto;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FotoController extends Controller
{
    public function index()
    {
        // Retrieve all Foto records along with their associated likes
        $fotos = Foto::with('likes')->get()->map(function ($foto) {
            $foto->like_count = $foto->likes()->count();
            return $foto;
        });
    
        // Get the authenticated user
        $user = Auth::user();
    

        
        // dd($userLikesPhoto);
    
        // Pass the $fotos variable and $userLikesPhoto array to the view along with other data
        return view('home.index', [
            'fotos' => $fotos,
        ]);
    }


    public function home(){
        return view('home.index');
    } 
    public function changefoto(){
        return view('foto/changefoto');
    } 
    public function formfoto(){

        $user = Auth::user();
        $albums = album::with('fotos')->where('user_id', $user->id)->get();
        // dd($albums);
        return view('foto.formfoto', compact('albums', 'user'));

    } 
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */

     public function store(Request $request)
     {
         $request->validate([
             'judul_foto' => 'required|string|max:255',
             'deskripsi_foto' => 'required|string',
             'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);
     
         $foto = new Foto();
         $foto->judul_foto = $request->judul_foto;
         $foto->deskripsi_foto = $request->deskripsi_foto;
         $foto->tanggal_unggah = now();
         $foto->user_id = auth()->user()->id;
        //  $foto->like_count = $foto->likes()->count();

         
         $file = $request->file('lokasi_file');
         $extension = $file->getClientOriginalExtension();
         $filename = 'foto_' . time() . '.' . $extension;
     
         $lokasi_file = $file->storeAs('public/fotos', $filename);
         $foto->lokasi_file = str_replace('public/', '', $lokasi_file);
     
         $foto->save();
     
         return redirect()->route('index')->with('success', 'Foto berhasil diunggah.');
     }
     

    /**
     * Display the specified resource.
     */
    public function show(foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foto = foto::findOrFail($id);
        return view('foto.changefoto', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'required|string',
        ]);
    
        $foto->update([
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto' => $request->deskripsi_foto,
        ]);
    
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fotoget = foto::findOrFail($id);
        // dd($fotoget);
        $fotoget->delete();

        return redirect()->route('index');
    }

    public function getLikeCount($foto)
    {
        // Count the number of likes for the specified photo
        $likeCount = like_foto::where('foto_id', $foto)->count();

        // Return the like count as a JSON response
        return response()->json(['likeCount' => $likeCount]);
    }

    public function detail(Request $request)
    {
        // Retrieve the photo ID from the request
        $fotoId = $request->input('foto_id');

        // Retrieve the specific photo data
        $foto = Foto::findOrFail($fotoId);

        $likeCount = $this->getLikeCount($fotoId);

        // Pass the photo data to the detail view
        return view('index', compact('foto', 'likeCount'));
    }

    public function like(Request $request, Foto $foto)
    {
        // Check if the user has already liked the photo
        $existingLike = like_foto::where('foto_id', $foto->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        // If the user has already liked the photo, do nothing
        if ($existingLike) {
            return response()->json(['message' => 'You have already liked this photo.']);
        }

        // Create a new like record
        $like = new like_foto();
        $like->foto_id = $foto->id;
        $like->user_id = auth()->user()->id;
        $like->save();

        return response()->json(['message' => 'Photo liked successfully.']);
    }

    /**
     * Unlike the specified photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function unlike(Request $request, Foto $foto)
    {
        // Find the like record
        $like = like_foto::where('foto_id', $foto->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        // If the like record exists, delete it
        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Photo unliked successfully.']);
        }

        // If the like record does not exist, do nothing
        return response()->json(['message' => 'You have not liked this photo.']);
    }

    public function checkLike(Foto $foto)
    {
        // Check if the authenticated user has liked the photo
        $liked = $foto->likes()->where('user_id', auth()->user()->id)->exists();

        // Return a JSON response indicating whether the user has liked the photo
        return response()->json(['liked' => $liked]);
    }

    public function komentars(Foto $foto)
    {
        $komentars = $foto->komentars()->with('user')->get();
        return response()->json([
            'success' => true,
            'komentars' => $komentars,
        ]);
    }
    
}
