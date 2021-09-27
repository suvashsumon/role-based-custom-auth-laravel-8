<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    function index()
    {
        if(Session::has('role_id'))
        {
            if(session('role_id') == 1) return redirect('admin/home');
            else if(session('role_id') == 2) return redirect('teacher/home');
            else if(session('role_id') == 3) return redirect('user/home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->input();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            $request->session()->put('role_id', Auth::user()->role_id);
            $request->session()->put('isLoggedIn', 'true');
            $request->session()->put('email', $data['email']);
            //return redirect()->intended('admin/home')->withSuccess('You have Successfully loggedin');
            if(Auth::user()->role_id == 1)
            {
                return redirect('admin/home');
            }
            else if (Auth::user()->role_id == 2)
            {
                return redirect('teacher/home');
            }
            else if (Auth::user()->role_id == 3)
            {
                return redirect('home');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }


    public function logout()
    {
        return "hello world";
        // Session::flush();
        // Auth::logout();
        // return redirect('/login');

    }
}
