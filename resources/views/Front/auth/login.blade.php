@extends('Front.layouts.master')
@section('PageName', 'Log In')
@section('contentSite')

    @include('Front.layouts.breadcrumb', [
        'Title' => 'Log In',
        'image' => asset('Front/images/hero_1.jpg'),
    ])

    <section class="site-section">
        <div class="container">
            <div class="row">
                {{-- @if ($errors->has(Config('fortify.username')))
            <div class="alert alert-danger">
                {{ $errors->first(Config('fortify.username')) }}
            </div>
            @endif --}}
                <div class="col-md-12">
                    <form action="{{ route('login') }}" method="POST" class="p-4 border rounded">
                        @csrf
                        <div class="row form-group">
                            {{-- <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input type="text" name="{{ Config('fortify.username') }}" id="fname"
                                    class="form-control @error(Config('fortify.username')) is-invalid @enderror"
                                    placeholder="Email address">
                                <div class="invalid-feedback"></div>
                                @error(Config('fortify.username'))
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input type="text" value="{{ old('email') }}" name="email" id="fname"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email address">
                                <div class="invalid-feedback"></div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input type="password" value="{{ old('password') }}" name="password" id="fname" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password">
                                    <div class="invalid-feedback"></div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Log In" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
