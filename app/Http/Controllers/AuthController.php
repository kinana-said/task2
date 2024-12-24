<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showloginForm(){
        return view('auth.login');

    }
    public function login(Request $request){
       if (Auth::attempt(["email"=>$request->email, "password"=>$request->password,"name"=>$request->name] )){
        $request->session()->regenerate();
        return redirect()->route("users.index");

       }
       return back()->withErrors(["message"=>"invalide email or password"]);

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}

