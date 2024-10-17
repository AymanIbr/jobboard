@extends('Front.layouts.master')
@section('PageName','Profile')
@section('contentSite')


        <section class="section-hero overlay inner-page bg-image" style="background-image: url({{ asset('Front/images/hero_1.jpg') }});" id="home-section">
            <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                <div class="card p-3 py-4">

                        <div class="text-center">
                            <img src="{{ Auth::check() && Auth::user()->image ? asset(Auth::user()->image) : asset('Front/images/user.png') }}" width="100" class="rounded-circle">
                        </div>

                        <div class="text-center mt-3">
                            <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                            <h5 class="mt-2 mb-0">{{ $profile->name }}</h5>
                            <span>{{ !empty($profile->job_title) ? $profile->job_title : 'No Job' }}</span>

                            @if($profile->cv && file_exists(public_path('Front/cvs/'. $profile->cv)))
                            <a href="{{ asset('Front/cvs/'.$profile->cv) }}" class="btn btn-success btn-block text-white">Download CV</a>
                        @else
                            <p class="text-danger">No CV available for download.</p>
                        @endif

                            <div class="px-4 mt-1">
                                <p class="fonts">{{ $$profile->bio ?? 'No Bio' }}</p>

                            </div>

                            <div class="px-3">
                        <a href="{{ $profile->facebook }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                        <a href="{{ $profile->twitter }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                        <a href="{{ $profile->linkedin }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                    </div>



                        </div>




                    </div>
                </div>
            </div>


            </div>
        </section>
@endsection
