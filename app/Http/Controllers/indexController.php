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

}
