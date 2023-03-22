<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function loginView()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        } else {
            return view('auth.login');
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', 'Invalid credentials');
            Session::flash('class', 'danger');
            return redirect()->back();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->createToken('MyApp')->accessToken;
                Auth::login($user);
                Session::flash('message', 'Login successful');
                Session::flash('class', 'success');
                return redirect()->route('user.dashboard');
            } else {
                Session::flash('message', 'Invalid credentials');
                Session::flash('class', 'danger');
                return redirect()->back();
            }
        } else {
            Session::flash('message', 'User not found');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('message', 'Logout successful');
        Session::flash('class', 'success');
        return redirect()->route('admin.loginView');
    }
}
