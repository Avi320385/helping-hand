<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;

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
              'password'=>'required'

           ]);
           Register::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ],[
             'name.required' => 'please add name',
             'email.required'=>'please add valid email'
        ]);

        //    $register = new Register();

        //     $register->name = $request->name;
        //     $register->email=$request->email;
        //     $register->password=$request->password;
        //     $register->save();
           return 'created';
    }
}
