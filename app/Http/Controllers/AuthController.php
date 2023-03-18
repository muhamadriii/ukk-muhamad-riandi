<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Village;
use Auth;
use View;
use Hash;

class AuthController extends Controller
{
    
    public function __construct(){
        $this->village = Village::orderBy('name', 'ASC')->get();

        View::share('village', $this->village);
    }

    public function loginView(){
        return view('auth.login');
    }

    public function login(Request $request){

        //login petugas/admin
        if (
            auth()->guard('petugas')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])
        ) {
            auth()->guard('masyarakat')->logout();
            return to_route('petugas.pengaduan.index');
        }

        // login masyarakat
        elseif(
            auth()->guard('masyarakat')->attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])
        ) {
            auth()->guard('petugas')->logout();
            return to_route('masyarakat.pengaduan.index');
        }

        //login false
        return redirect()->back();
        
    }

    public function logout(Request $request){
        Auth::guard('petugas')->logout();
        Auth::guard('masyarakat')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login.view');
    }

    public function registerMasyarakat(Request $request){
        $validated = $request->validate([
            'village_id' => 'required',
            'nik' => 'required|integer|unique:masyarakats',
            'name' => 'required',
            'username' => 'required|unique:petugas,username|unique:masyarakats,username',
            'password' => 'required|max:10|min:4',
            'telp' => 'required|max:13|min:11',
        ]);

        $payload = $request->all();
        $payload['password'] = Hash::make($request->password);
        $data = masyarakat::create($payload);

        return to_route('login');

    }

    public function registerMasyarakatView(){
        return view('auth.masyarakat-register');
    }

}