<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailsController extends Controller
{
    public function index() {
        return view('users.details');
    }

    public function name(Request $request) {
        $validated = $request->validate([
            'name'=> ['required','string','min:5', 'max:20'],
        ]);
        Auth::user()->update(['name'=>$validated['name']]);
        return back();
    }
    public function email(Request $request) {
        dd($request);
    }

}
