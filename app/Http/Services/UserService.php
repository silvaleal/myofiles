<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    // Métodos para atualizações
    public function changeName(Request $request) {
        $validated = $request->validate([
            'name'=> ['required','string','min:5', 'max:20'],
        ]);
        Auth::user()->update(['name'=>$validated['name']]);
        return back();
    }
    public function changeEmail(Request $request) {
        dd($request);
    }
    public function changePassword(Request $request)
    {
        ## Trocando a senha do usuário
        $validated = $request->validate([
            "old_password" => ["required","string","min:5", "max:20"],
            "new_password" => ["required","string","min:5", "max:20"],
        ]);

        if (Hash::check($validated['old_password'], Auth::user()->password)) {
            return back()->with("error","Esta já é a sua senha atual.");
        }

        if ($validated['old_password'] == $validated['new_password']) {
            return back()->with('error','Você já utiliza esta senha.');
        }

        User::where('id', Auth::user()->id)->update(['password'=>Hash::make($validated['new_password'])]);

        return back()->with('success','Senha alterada com sucesso.');
    }

    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return to_route('home');
    }
}
