@extends('Dashboard.layouts.master')
@section('Broser','Create Category')
@section('title','Create Category')
@section('subtitle','Create Category')
@section('css')
@section('content')


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-form">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label class="custom-file-label" for="image">Choose image</label>
            </div>
          </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="active">
              <label class="custom-control-label" for="active">Active</label>
            </div>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick ="store()" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>


@endsection

@section('script')

<script>

    function store(){
      let formData = new FormData();
      formData.append('name',document.getElementById('name').value);
      formData.append('active',document.getElementById('active').checked ? 1 : 0);
      formData.append('image',document.getElementById('image').files[0]);
      axios.post('/admin/dashboard/categories', formData)
      .then(function (response) {
      // handle success
      console.log(response);
      toastr.success(response.data.message);
      document.getElementById('create-form').reset();
    })
    .catch(function (error) {
      // handle error
    //   console.log('Ayman');
      toastr.error(error.response.data.message);
    })
    .finally(function () {
      // always executed
    });
    }

  </script>
@endsection
