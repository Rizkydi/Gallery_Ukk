<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function detailprofile(){
        return view('profile.detailprofile');
    }
    public function userprofile(){
        $user = Auth::user();
        $fotos = foto::where('user_id', $user->id)->get();
        return view('profile.userprofile', compact('fotos'));
    }
    
    // public function update(Request $request){
    //     $request->validate([
    //         'name' => ['string', 'min:3', 'max:191', 'required'],
    //         'email' => ['email', 'string', 'min:3', 'max:191', 'required'],
    //     ]);
    // }
}
