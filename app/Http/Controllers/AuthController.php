<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function login(){
    return view('login');
}

public function ceklogin(Request $request){
    $login = [
        'email' => $request->email,
        'password' => $request->password
    ];

    $pengguna = User::where('email',$request->email)->first();

    if($pengguna!=null){
        $id = $pengguna->id;
        session_start();
        $_SESSION["id"] = $id;
    }

    if(Auth::attempt($login))
    {
        if(Auth::user()->role == 'Admin')
        {
            return redirect('/a_home');
        }
        else if(Auth::user()->role == 'Driver')
        {
            return redirect('/d_home');
        }
        else if(Auth::user()->role == 'User')
        {
            return redirect('/p_home');
        }
    }
    else
    {
        return redirect('/')->with('alert','Email atau Password salah!');
    }
}

public function logout(){
    session_start();
    session_destroy();
    Auth::logout();
    return redirect ('/');
}

}
