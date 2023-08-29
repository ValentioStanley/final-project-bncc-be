<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //
    public function registerPage(){
        return view('registerUser');
    }

    public function fillRegister(Request $request){
        $request->validate([
            'namaLengkap' => 'required|min:3|max:40',
            'email' => 'required|email:dns',
            'password' => 'required|min:6|max:12',
            'nomorHandphone' => 'required|numeric|starts_with:08',
        ]);

        User::create([
            'namaLengkap'=>$request->namaLengkap,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nomorHandphone'=>$request->nomorHandphone,
        ]);
        return redirect('/login');
    }

    public function login(){
        return view('login');
    }
    // ini dipake untuk login biar cocok sama data yg udah disign up di register
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) { // kalo kematch data di db baru diterima
            $acceptLogin = $request->session()->regenerate(); // penerimaan login

            if($acceptLogin->role ==='Admin'){
                return redirect()->intended(route('allItem'));
            }else if($acceptLogin->role === 'User'){
                return redirect()->intended(route('user')); // setelah terima, langsung ke lokasi web tertentu
            }
        }

        return back()->withErrors([ // kalo login gak ada cocok data di db emg krn gak ada data di db maka output error
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // buat logout dari akun
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
