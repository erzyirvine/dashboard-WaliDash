<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('main_dashboard');
    }

    public function indexMahasiswa(){
        return view('mahasiswa_wali');
    }

    public function indexMengulang(){
        return view('mahasiswa_mengulang');
    }

    public function indexWatchList(){
        return view('mahasiswa_watchList');
    }

    public function indexProfile(){
        return view('profile_mhs');
    }

    public function indexProfileGreen(){
        return view('profile_mhs_green');
    }

    public function indexLogout(){
        return view('login_page');
    }

    public function login(Request $req){



        $username = $req->input('username');
        $password = $req->input('password');

        if($username == 'admin123' && $password == 'admin123'){
            return redirect()->route('main_dashboard');
        }else{
            return back()->with('error','Username & Password Salah');
        }
    
    }
}
