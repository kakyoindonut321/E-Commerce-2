<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class AuthController extends Controller
{
    public function user(User $user) {
        $userdata = [
            'title' => 'Profile',
            'cartCount' => $this->cartCount
        ];
        return view('user.user', $userdata);
    }


    public function login() {
        return view('user.login');
    }
    
    public function registration() {
        return view('user.registration');
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:20",
            "imgProfile" => File::image()->max(2048)
        ]);

        $data = $request->all();

        if ($request->file("imgProfile")) {
            if (auth()->user()->profile_image) {
                Storage::delete("profileImg/" . auth()->user()->profile_image);
            }

            $imgHashName = $request->file("imgProfile")->hashName();
            $request->file("imgProfile")->storeAs("profileImg", $imgHashName, 'public');
            $data["profile_image"] = $imgHashName;
        }


        // unset($data["_token"]);
        unset($data["email"]);
        unset($data["password"]);

        User::find(auth()->id())->update($data);
        return redirect()->back()->with("message-success", "Profil telah di update");
    }

    public function registerUser(Request $request) {
        $userForm = $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max: 20',
            // 'privilege' => 'required',
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
        return redirect()->to("/")->with('message-success', 'anda telah log out');
    }
}
 