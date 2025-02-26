<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function security() 
    {
        return view('users.security');
    }

    public function licenses() 
    {
        return view('users.licenses', [
            "licenses"=>License::where("user_id", Auth::user()->id)->get()
        ]);
    }

    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return to_route('home');
    }
}
