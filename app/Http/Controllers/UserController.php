<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

   public function profile()
   {
       return view('profile');
   }

   public function logout()
   {
       Auth::logout();

       return redirect('/');
   }
}


