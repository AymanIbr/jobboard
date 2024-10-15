@extends('Front.layouts.master')
@section('PageName', 'Register')
@section('contentSite')

    @include('Front.layouts.breadcrumb', [
        'Title' => 'Register',
        'image' => asset('Front/images/hero_1.jpg'),
    ])


    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <form action="{{ route('register') }}" method="POST" class="p-4 border rounded">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="username">Username</label>
                                <input type="text" name="name" id="username" class="form-control @error('name') is-invalid @enderror" placeholder="Username" >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Email</label>
                                <input type="text" name="email" id="fname"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email address">
                                <div class="invalid-feedback"></div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Password</label>
                                <input type="password" name="password" id="fname"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Password">
                                <div class="invalid-feedback"></div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row form-group mb-4">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="password_confirmation">Re-Type Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  @error('password') is-invalid @enderror" placeholder="Re-type Password" >
                                <div class="invalid-feedback"></div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
