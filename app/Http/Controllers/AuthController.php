<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login() {
        return view('user.login');
    }
    
    public function registration() {
        return view('user.registration');
    }

    public function registerUser(Request $request) {
        $userForm = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max: 20'
        ]);
        $userForm['password'] = Hash::make($request->password);

        $user = User::create($userForm);

        auth()->login($user);

        return redirect('/');
    }

    public function loginUser(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credential = $request->all();
        unset($credential["_token"]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect('/product');
        }

        return back()->with("wrongAuth", "Email atau Password salah");
    }
    
    public function product() {
        return view('product.listing');
    }

    public function logout() {
        auth()->logout();
        return redirect()->to("/login");
    }
}
 