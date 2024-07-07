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
              'name'=>'required',
              'email'=>'required',
              'password'=>'required',
              //'enum'=>'required'

           ]);
           User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'type' => $request->type,
        ],[
             'name.required' => 'please add name',
             'email.required'=>'please add valid email'
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
