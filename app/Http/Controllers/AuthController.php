<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return view('sign-in');
    }
    public function signIn()
    {
        return view('sign-in');
    }
    public function login(request $request)
    {
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($auth) {
            if (Auth::user()->role == 'administrator') {
                return redirect('administrator/dashboard');
            }
            return redirect('user/dashboard');
        }else{
            return redirect()->back()->with('message','Email Atau Password Salah');
        }
    }
    public function signUp()
    {
        return view('sign-up');
    }
    public function store(request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,id|email',
            'password' => 'required',
        ], [
            'name.required' => 'Nama harus Diisi',
            'email.required' => 'Email harus Diisi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Dipakai',
            'password.required' => 'Password Harus Diisi',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        Auth::attempt(['email' => $user->email, 'password' => $user->password]);

        return redirect('user/dashboard');
    }
    public function userDashboard(){
        return view('user.dashboard');
    }
}
