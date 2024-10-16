<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job\Job;
use App\Models\JobSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $jobs = Job::select()->orderBy('id', 'desc')->paginate(5);
        $totalJobs = Job::count();

        return view('Front.index', compact('jobs', 'totalJobs'));
    }
    public function profile()
    {
        return view('Front.profile');
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

   

}
