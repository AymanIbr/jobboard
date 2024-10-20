@extends('Dashboard.layouts.master')
@section('Broser','Jobs')
@section('title','Jobs')
@section('subtitle','Jobs')
@section('css')
@section('content')



        <!-- /.row -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Jobs Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Job Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Settings</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            @foreach ( $jobs as $job )
                            <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$job->job_title}}</td>
                               <td>{{$job->category->name}}</td>
                               <td>
                                   <img class="profile-user-img img-fluid img-circle" height="50" width="50" src="{{Storage::url($job->image)}}" alt="User profile picture">
                               </td>
                               <td>{{$job->created_at->format('d- m - Y')}}</td>
                               <td>{{$job->updated_at->format('d- m - Y')}}</td>
                               <td>
                                   <div class="btn-group">
                                    <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-edit"></i></a>
                                    <a href="#" onclick="confirmDestroy({{$job->id}},this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                   </div>
                               </td>
                             </tr>
                            @endforeach
                           </tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
@endsection


@section('script')
      <script>

        function confirmDestroy(id,reference){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id,reference);
                }
                })
            }
            function destroy(id,reference){
                axios.delete('/admin/dashboard/jobs/'+id)
                .then(function (response) {
                    // handle success
                    //فئة ال200
                    console.log(response);
                    ShowMessage(response.data);
                    reference.closest('tr').remove();
                })
                .catch(function (error) {
                    // handle error
                    //فئة ال400
                    console.log(error);
                    ShowMessage(error.response.data)
                })
                .then(function () {
                    // always executed
            });

                                }
            function ShowMessage(data){
                Swal.fire({
                    icon: data.icon,
                    title: data.title,
                    text: data.text,
                    showConfirmButton: false,
                    timer: 1500
                })
            }

          </script>
@endsection
