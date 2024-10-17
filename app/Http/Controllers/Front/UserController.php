<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $profile = Auth::user();
        return view('Front.profile', compact('profile'));
    }

    public function applications()
    {
        $applications = Application::with('job')->where('user_id', Auth::id())->get();
        return view('Front.users.applications', compact('applications'));
    }

    public function savedJobs()
    {
        $savedJobs = JobSaved::with('job')->where('user_id', Auth::user()->id)->get();
        return view('Front.users.savedjobs', compact('savedJobs'));
    }
}
