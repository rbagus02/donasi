<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class AuthController extends Controller
{
    public function login()
    {
        return view('guest/login');
    }

    public function postlogin(Request $request)
    {
        //dd($request->all());
        if(Auth::attempt($request->only('username','password')))
        {
            if(auth()->user()->role == 1){
                return redirect('halaman-admin');
            }else{
                return redirect('halaman-users');
            }
                
            
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
