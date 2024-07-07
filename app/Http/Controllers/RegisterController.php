<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('Register');
    }
    public function create(Request $request)
    {
           $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
              //'enum'=>'required'

           ],[
            'name.required' => 'Please add a name',
            'email.required' => 'Please add a valid email',
            'email.email' => 'The email must be a valid email address',
            'password.required' => 'Please enter a valid password',
            'password.min' => 'The password must be at least 6 characters',
            'password.confirmed' => 'The password confirmation does not match',

           ]);
           User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'type' => $request->type,
        ]);

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $request->session()->regenerate();

            //return 'logged in';
            if (Auth::user()->type=='user') {
                return view('user');
             } else if (Auth::user()->type=='worker') {
                 return view('worker');
               }
        }
    }
}

