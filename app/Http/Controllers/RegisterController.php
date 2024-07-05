<?php

namespace App\Http\Controllers;

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
           User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ],[
             'name.required' => 'please add name',
             'email.required'=>'please add valid email'
        ]);

           $user = new User();

           $user->name = $request->name;
           $user->email=$request->email;
           $user->password=$request->password;
           $user->save();
           return 'created';
    }
}
