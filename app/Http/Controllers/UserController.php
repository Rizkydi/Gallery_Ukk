<?php

namespace App\Http\Controllers;
use App\Models\User;
use view;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function showByName($name)
    {
        $user = User::where('name', $name)->first();
        return view('users.show', compact('user'));
    }
}
