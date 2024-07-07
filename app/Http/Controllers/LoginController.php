<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'name.required' => 'please add name',
            'email.required'=>'please add valid email'
       ]);
   

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

           // return 'logged in';

        if (Auth::user()->type == 'user') {
            return view('user');
         } else if (Auth::user()->type=='worker') {
             return view('worker');
           }

           return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        }
}
public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}



}

