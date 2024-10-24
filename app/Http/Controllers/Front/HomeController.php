<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job\Job;
use App\Models\Job\Search;
use App\Models\JobSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Nnjeim\World\Models\Country;
use Nnjeim\World\World;
use Nnjeim\World\WorldHelper;

class HomeController extends Controller
{

    public function index(WorldHelper $world)
    {
        $jobs = Job::select()->orderBy('id', 'desc')->paginate(5);
        $totalJobs = Job::count();

        $countries = Country::all();

        // Trending Keyword

            $duplicates = Search::select('keyword')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('keyword')
            ->take(3)
            ->havingRaw('COUNT(*) > 1')
            ->orderBy('count', 'desc')
            ->get();


        return view('Front.index', compact('jobs', 'totalJobs', 'countries','duplicates'));
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

    public function searchJob(Request $request)
    {
        // \dd($request);
        // $job_title = Job::where('job_title', 'like', '%' . $request->search . '%')
        //     ->orWhere('job_type', 'like', '%' . $request->search . '%')->get();

        $request->validate([
            'job_title' => "required",
            'job_region' => "required",
            'job_type' => "required"
        ]);

        // Trending Keyword

        Search::Create([
            "keyword" => $request->job_title
        ]);

        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_type');

        $searchJobs = Job::select()->where('job_title', 'like', "%$job_title%")
            ->where('job_region', 'like', "%$job_region%")
            ->where('job_type', 'like', "%$job_type%")
            ->get();

        return view('Front.search', compact('searchJobs'));
    }
}
