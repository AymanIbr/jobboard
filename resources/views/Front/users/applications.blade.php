@extends('Front.layouts.master')
@section('PageName', 'Applications')
@section('contentSite')

@include('Front.layouts.breadcrumb', [
    'Title' => 'Applications',
    'subTitle' => 'job',
    'image' => '/Front/images/hero_1.jpg',
])


<section class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">Applications</h2>
            </div>
        </div>

        <ul class="job-listings mb-5">
            @if ($applications->isEmpty())
                <li class="list-group-item text-center">
                    <p class="lead">No applications available.</p>
                </li>
            @else
                @foreach ($applications as $application)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('jobSinglePage',$application->job->slug) }}"></a>
                        <dd></dd>
                        <div class="job-listing-logo">
                            <img src="{{ Storage::url($application->job->logo) }}"
                                alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $application->job->job_title }}</h2>
                                <strong>{{ $application->job->company }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $application->job->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span
                                    class="badge @if ($application->job->job_type == 'Full Time') bg-success @else bg-danger @endif">{{ $application->job->status }}
                                </span>
                            </div>
                        </div>

                    </li>
                @endforeach
            @endif


        </ul>

    </div>
</section>


@endsection
