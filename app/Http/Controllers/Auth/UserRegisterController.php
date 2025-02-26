<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view("users.register");
    }

    public function register(Request $request){
        $validated = $request->validate([
            "name"=>["required","string","min:5", "max:20"],
            "email"=>["required", "email"],
            "password"=>["required","string", 'min:5', 'max:20', 'confirmed'],
        ], [
            "password.min"=>"Esta senha é muito curta, tamanho mínimo é de 5 caracteres",
            "password.max"=>"Senha muito grande, tamanho máximo é de 5 caracteres"
        ]);
       
        if (User::where('name', $validated['name'])->first()) {
            return back()->with('error','Este nome já está sendo utilizado');
        }
       
        if (User::where('email', $validated['email'])->first()) {
            return back()->with('error','Email já cadastrado');
        }

        $user = User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "password"=> Hash::make($validated["password"]),
        ]);

        Auth::login($user);

        return to_route('home');
    }
}
