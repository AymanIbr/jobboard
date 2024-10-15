<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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

    public function jobSingel($slug)
    {

        $job = Job::where('slug', $slug)->firstOrFail();
        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->paginate(5);

        // save job
        $savedJob = JobSaved::where('job_id', $job->id)
            ->where('user_id', Auth::user()->id)
            ->count();

        return view('Front.job-single', compact('job', 'relatedJobs','savedJob'));
    }

    public function saveJob(Request $request)
    {
        $saveJob = JobSaved::create([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'job_image' => $request->job_image,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'company' => $request->company,
        ]);
        if ($saveJob) {
            return redirect()->route('jobSinglePage', ['slug' => $request->slug])
                ->with('success', 'Job saved successfully!');
        }
    }
}
