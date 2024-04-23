<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use laravolt\Avatar\Facade as Avatar;


class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginprocess(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
    }

    public function register(){
        return view('register');
    }

    public function registeruser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        // Avatar::create($request->name)->save(storage_path('app/public/avatar-' . $user->id . '.png'));
        Auth::login($user);

        return redirect('/home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
