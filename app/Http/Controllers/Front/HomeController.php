<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job\Job;
use Illuminate\Http\Request;

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

    public function jobSingel($slug = null)
    {
        if ($slug) {
            $job = Job::where('slug', $slug)->first();
            // \dd($job);
            return view('Front.job-single', compact('job'));
        }
    }
}
