<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job\Job;
use App\Models\JobSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleController extends Controller
{

    public function jobSingel($slug)
    {

        $job = Job::where('slug', $slug)->firstOrFail();

        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->paginate(5);

        // all categories
        $categories = Category::where('active', true)->get();

        // save job
        $savedJob = JobSaved::where('job_id', $job->id)
            ->where('user_id', Auth::user()->id)
            ->count();

        // verfining if user applied to job

        $appliedJob = Application::where('job_id', $job->id)
            ->where('user_id', Auth::user()->id)->count();

        return view('Front.job-single', compact('job', 'relatedJobs', 'savedJob', 'appliedJob', 'categories'));
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

    public function jobApply(Request $request)
    {
        if ($request->cv == 'No cv') {
            return redirect()->route('jobSinglePage', ['slug' => $request->slug])
                ->with('success', 'upload you cv first in the profile page!');
        } else {
            $applyJob = Application::create([
                'cv' => Auth::user()->cv,
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                'job_image' => $request->job_image,
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'job_type' => $request->job_type,
                'company' => $request->company,
            ]);
        }
        if ($applyJob) {
            return redirect()->route('jobSinglePage', ['slug' => $request->slug])
                ->with('success', 'Job saved successfully!');
        }
    }

    public function singleCategory($name)
    {
        $category = Category::where('name', $name)->first();

        $jobs = $category->jobs()
            ->take(5)
            ->orderby('created_at', 'desc')
            ->get();
        return view('Front.categories.single', compact('jobs', 'name'));
    }
}
