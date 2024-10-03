    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo $image; ?>');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
                @isset($Title)
                <h1 class="text-white font-weight-bold">{{ $Title }}</h1>
                @endisset
              {{-- <div class="custom-breadcrumbs">
                <a href="{{ route('indexPage') }}">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>{{ $Title }}</strong></span>
              </div> --}}
              <div class="custom-breadcrumbs">
                <a href="{{ route('indexPage') }}">Home</a> <span class="mx-2 slash">/</span>
                @isset($subTitle)
                <a href="#">{{ $subTitle }}</a> <span class="mx-2 slash">/</span>
                @endisset
                @isset($Title)
                <span class="text-white"><strong>{{ $Title }}</strong></span>
                @endisset
              </div>
            </div>
          </div>
        </div>
      </section>


     <!-- HOME -->
     {{-- <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Post A Job</h1>
              <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="#">Job</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Post a Job</strong></span>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
