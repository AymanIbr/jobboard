@extends('Front.layouts.master')
@section('PageName','Login')
@section('contentSite')

@include('Front.layouts.breadcrumb',[
    'Title' => 'Login',
    'image' => 'Front/images/hero_1.jpg'
])

    <section class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <form action="#" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input type="text" id="fname" class="form-control" placeholder="Email address">
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <input type="password" id="fname" class="form-control" placeholder="Password">
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

