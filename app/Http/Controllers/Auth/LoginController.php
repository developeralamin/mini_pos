<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
    	return view('login.form',$this->data);
    }

    public function authenticate(LoginRequest $request)
    {
    	 $data = $request->only('email', 'password');

      if (Auth::attempt($data)) {
        return redirect()->intended('dashboard');
      }
      else{
      	  return redirect()->route('login')->withErrors(['Invalid Email and Password']);
      }

    }

    public function logout()
    {
       Auth::logout();
       return redirect()->route('login');
    }
}
