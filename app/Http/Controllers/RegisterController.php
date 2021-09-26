<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller
{
    function index()
    {
        if(Session::has('role_id'))
        {
            if(session('role_id') == 1) return redirect('admin/home');
            else if(session('role_id') == 2) return redirect('teacher/home');
            else if(session('role_id') == 3) return redirect('user/home');
        }
        return view('auth.register');
    }

    function register(Request $req)
    {
        // validataion
        $req->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:7',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        $req->session()->put('role_id', 3);
        $req->session()->put('email', $req->email);
        $req->session()->put('name', $req->name);

        return redirect("user/home");
    }
}
