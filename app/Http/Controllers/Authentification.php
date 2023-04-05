<?php

namespace App\Http\Controllers;

use App\Models\user;
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

        user::create([
            "username" => $req->username,
            "password" => $req->password,
            "email" => $req->email,
            "role" => false,
        ]);
        session()->flash("registeration", "please login to access to your Account");
        return redirect("/");
    }

    //login logic

    public function login(){
        return view("auth.login");
    }

    public function loginPost(Request $req){
        $attributes = $req->validate([
            "email" => ["filled", "required"],
            "password" => "filled|required|min:6",
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect("/Dashboard");
        }else{
            return back()->withErrors(["message" => "invalide email/password"]);
        }
    
    }

    public function logout(){
        auth()->logout();
        return redirect("/");
    }
}
