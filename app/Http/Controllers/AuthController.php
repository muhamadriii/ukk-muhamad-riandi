<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    
    public function loginView(){
        return view('auth.login');
    }

    public function login(Request $request){

        if (
            auth()->guard('petugas')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])
        ) {
            auth()->guard('masyarakat')->logout();
            return to_route('petugas.masyarakat.index');
        }
        
        elseif(
            auth()->guard('masyarakat')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])
        ) {
            auth()->guard('petugas')->logout();
            return redirect('/');
        }

        return redirect()->back();
        
    }

    public function logout(Request $request){
        Auth::guard('petugas')->logout();
        Auth::guard('masyarakat')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login.view');
    }
}