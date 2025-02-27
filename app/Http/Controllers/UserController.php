<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\License;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function show(User $user)
    {
        // TODO: Fazer a página dos usuários
    }
    public function details() {
        return view('users.details');
    }

    public function security() 
    {
        return view('users.security');
    }

    public function licenses() 
    {
        return view('users.licenses', ["licenses"=>License::where("user_id", Auth::user()->id)->get()
        ]);
    }

    public function updateName(Request $request) {
        return $this->service->changeName($request);
    }

    public function updateEmail(Request $request) {
        return $this->service->changeEmail($request);
    }

    public function updatePassword(Request $request) {
        return $this->service->changePassword($request);
    }

    public function logout() {
        return $this->service->logout();
    }
}
