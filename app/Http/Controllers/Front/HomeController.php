<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('Front.index');
    }
    public function profile()
    {
        return view('Front.profile');
    }
    public function login()
    {
        return view('Front.login');
    }
    public function register()
    {
        return view('Front.register');
    }
    public function postJob()
    {
        return view('Front.post-job');
    }
    public function contact()
    {
        return view('Front.contact');
    }

    public function about()
    {
        return view('Front.about');
    }

    public function jobSingel()
    {
        return view('Front.job-single');
    }
}
