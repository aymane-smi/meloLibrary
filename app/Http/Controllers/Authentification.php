<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Authentification extends Controller
{
    //registration logic
    public function register(){
        return view("auth.register");
    }

    public function registerPost(Request $req){
        $req->validate([
            "username" => ["filled", "required", Rule::unique("users", "username")],
            "email" => ["filled", "required", Rule::unique("users", "email"), "email"],
            "password" => "filled|required|min:6",
        ]);

        User::create([]);
    }
}
