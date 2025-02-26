<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSecurityController extends Controller
{
    public function index()
    {
        return view('users.security');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            "old_password" => ["required","string","min:5", "max:20"],
            "new_password" => ["required","string","min:5", "max:20"],
        ]);
        if (Hash::check($validated['old_password'], Auth::user()->password)) {
            return back()->with("error","Senha atual incorreta");
        }

        if ($validated['old_password'] == $validated['new_password']) {
            return back()->with('error','Você já utiliza esta senha.');
        }
        return back()->with('success','Senha alterada com sucesso.');
    }

}
