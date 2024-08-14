<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() 
    {
        if(Auth::check()) {
            return redirect(route('layout.landing'));
        }
        return view("auth.login");
    }

    public function registration() 
    {
        if(Auth::check()) {
            return redirect(route('layout.landing'));
        }
        return view("auth.registration");
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('layout.landing'));
        }
        return redirect(route('login'))->with("error", "Invalid Email or Password!");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user){
            return redirect(route('registration'))->with("error", "Registration failed! Try again.");
        }
        return redirect(route('login'))->with("success", "Registration successful, login to access the app.");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}