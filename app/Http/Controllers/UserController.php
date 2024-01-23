<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegister()
   {
       return view('register');
   }

   public function register(Request $request)
   {
       $user = User::query()->create([
           'name'=>$request['name'],
           'email'=>$request['email'],
           'password'=>Hash::make($request['password'])
       ]);

       Auth::login($user);

       return redirect()->route('profile');
   }
}


