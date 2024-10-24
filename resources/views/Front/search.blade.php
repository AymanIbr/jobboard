@extends('Front.layouts.master')
@section('PageName', 'Search Results')
@section('contentSite')

@include('Front.layouts.breadcrumb', [
    'Title' => 'Search Results',
    'subTitle' => 'Job',
    'image' => asset('/Front/images/hero_1.jpg'),
])


<section class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Search Results</h2>
            </div>
        </div>

        <ul class="job-listings mb-5">
            @if ($searchJobs->isEmpty())
                <li class="list-group-item text-center">
                    <p class="lead">No jobs with this search just yet</p>
                </li>
            @else
                @foreach ($searchJobs as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('jobSinglePage',$job->slug) }}"></a>
                        <dd></dd>
                        <div class="job-listing-logo">
                            <img src="{{Storage::url($job->logo)}}"
                                alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job->job_title }}</h2>
                                <strong>{{ $job->company }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span
                                    class="badge @if ($job->job_type == 'Full Time') bg-success @else bg-danger @endif">{{ $job->status }}</span>
                            </div>
                        </div>

                    </li>
                @endforeach
            @endif


        </ul>

    </div>
</section>


@endsection
