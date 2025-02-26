<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        return view("users.login");
    }

    public function login(Request $request) {
        $validated = $request->validate([
            "email"=>["required", "email"],
            "password"=>["required","string", 'min:5', 'max:20'],
        ]);

        if (!Auth::attempt($validated)) {
            return back()->with('error', 'Nenhuma conta foi encontrada com estas credenciais');
        }
        return to_route('home');
    }
}
