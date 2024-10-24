@extends('Front.layouts.master')
@section('PageName', 'Update Details')
@section('contentSite')

    @include('Front.layouts.breadcrumb', [
        'image' => asset('Front/images/hero_1.jpg'),
        'Title' => 'Update Details',
    ])
    <section class="site-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Update User Details</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="p-4 p-md-5 border rounded" action="{{ route('update.details') }}" method="POST">
                        @csrf
                        @method('patch')
                        <!--job details-->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $userDetails->name }}" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Name">
                            <div class="invalid-feedback"></div>
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                            {{-- @if ($errors->has('name'))
                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                            @endif --}}
                            <div class="form-group">
                                <label for="job_title">Job Title</label>
                                <input type="text" value="{{ $userDetails->job_title }}" name="job_title"
                                    class="form-control @error('job_title') is-invalid @enderror" id="job_title"
                                    placeholder="Job Title">
                                <div class="invalid-feedback"></div>
                                @error('job_title')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="bio">Bio</label>
                                    <textarea name="bio" id="bio" cols="30" rows="7"
                                        class="form-control @error('bio') is-invalid @enderror " placeholder="Write bio...">{{ $userDetails->bio }}</textarea>
                                    <div class="invalid-feedback"></div>
                                    @error('bio')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" value="{{ $userDetails->facebook }}" name="facebook"
                                    class="form-control @error('facebook') is-invalid @enderror " id="facebook"
                                    placeholder="Facebook URL">
                                <small class="form-text text-muted" style="font-size: 0.9em; color: #080808;">
                                    Please enter your Facebook URL (e.g., https://facebook.com/username).
                                </small>
                                <div class="invalid-feedback"></div>
                                @error('facebook')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="twiter">Twitter</label>
                                <input type="text" value="{{ $userDetails->twiter }}" name="twiter"
                                    class="form-control @error('twiter') is-invalid @enderror " id="twiter"
                                    placeholder="Twitter URL">
                                <small class="form-text text-muted" style="font-size: 0.9em; color: #6c757d;">
                                    Please enter your Twitter URL (e.g., https://twitter.com/username).
                                </small>
                                <div class="invalid-feedback"></div>
                                @error('twiter')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" value="{{ $userDetails->linkedin }}" name="linkedin"
                                    class="form-control @error('linkedin') is-invalid @enderror" id="linkedin"
                                    placeholder="LinkedIn URL">
                                <small class="form-text text-muted" style="font-size: 0.9em; color: #6c757d;">
                                    Please enter your LinkedIn URL (e.g., https://linkedin.com/in/username).
                                </small>
                                <div class="invalid-feedback"></div>
                                @error('linkedin')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-lg-4 ml-auto">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-primary btn-md"
                                            style="margin-left: 200px;">Update</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection
