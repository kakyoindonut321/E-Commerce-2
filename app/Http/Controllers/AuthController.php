<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max: 20'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res) {
            return redirect('login');
        } else {
            return back()->with('deez', 'hah gottem');
        }

    }

    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max: 20'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->password);
                return redirect('dashboard');
            } else {
                return back()->with('unmatch', 'wrong password');
            }
        }else {
            return back()->with('deez', 'wtf');
        }
    }
    
    public function dashboard() {
        return view('user.dashboard');
    }

    public function logout() {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
 