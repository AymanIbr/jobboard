@extends('Front.layouts.master')
@section('PageName', 'Update User CV')
@section('contentSite')

    @include('Front.layouts.breadcrumb', [
        'image' => asset('Front/images/hero_1.jpg'),
        'Title' => 'Update User CV',
    ])
    <section class="site-section">
        <div class="container">

            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2>Update User CV</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <form class="p-4 p-md-5 border rounded" action="{{ route('update.cv') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('patch')
                        <!--job details-->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="cv" class="custom-file-input @error('cv') is-invalid @enderror" id="cv">
                                <label class="custom-file-label" for="cv">Choose CV</label>
                                <div class="invalid-feedback"></div>
                                @error('cv')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
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

@section('script')
<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0].name;
        const nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection

