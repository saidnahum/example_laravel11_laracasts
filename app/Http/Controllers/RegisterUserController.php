<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }

    public function store(){
        // Validate form
        $validatedAttributes = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'] // confirmed is password_confirmation field
        ]);

        // Create user in db
        $user = User::create($validatedAttributes);

        // login
        Auth::login($user);

        // Redirect
        return redirect("/jobs");
    }
}
