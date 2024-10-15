@extends('Dashboard.layouts.master')
@section('Broser', 'Edit Job')
@section('title', 'Edit Job')
@section('subtitle', 'Edit Job')
@section('css')
@section('content')


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Job</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="create-form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control" value="{{ old('job_title') ?? $job->job_title }}" id="job_title"
                        placeholder="Enter Job name">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Choose image</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="logo">Choose logo</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="job_region">Job Region</label>
                    <input type="text" class="form-control" value="{{ old('job_region') ?? $job->job_region }}"
                        id="job_region" placeholder="Enter Job region">
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" value="{{ old('company') ?? $job->company }}" id="company"
                        placeholder="Enter Company">
                </div>
                <div class="form-group">
                    <label for="job_type">Job Type</label>
                    <select class="form-control" id="job_type">
                        <option value="">Select Job Type</option>
                        <option value="Part Time" @if ($job->job_type == 'Part Time') selected @endif>Part Time</option>
                        <option value="Full Time"@if ($job->job_type == 'Full Time') selected @endif>Full Time</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control category" id="category_id" style="width: 100%;">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($job->category_id == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="vacancy">Number of Vacancies</label>
                    <input type="number" value="{{ old('vacancy') ?? $job->vacancy }}" class="form-control" id="vacancy"
                        placeholder="Enter Number of Vacancies" min="1">
                </div>
                <div class="form-group">
                    <label for="salary">Salary (in USD)</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="number" value="{{ old('salary') ?? $job->salary }}" class="form-control"
                            id="salary" placeholder="Enter Salary in USD" min="0"
                            title="Please enter a positive number" aria-describedby="salaryHelp">
                    </div>
                    <small id="salaryHelp" class="form-text text-muted">
                        Enter the salary amount in US dollars. Must be a positive number.
                    </small>
                </div>

                <div class="form-group">
                    <label for="experience">Experience Level</label>
                    <select class="form-control" id="experience">
                        <option value="">Select Experience Level</option>
                        <option value="1-3 years" @if ($job->experience == '1-3 years') selected @endif>1-3 years</option>
                        <option value="3-6 years" @if ($job->experience == '3-6 years') selected @endif>3-6 years</option>
                        <option value="6-9 years" @if ($job->experience == '6-9 years') selected @endif>6-9 years</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender">
                        <option value="M" @if ($job->gender == 'Male') selected @endif>Male</option>
                        <option value="F" @if ($job->gender == 'Female') selected @endif>Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="application_deadline">Application Deadline</label>
                    <input type="date" value="{{ old('application_deadline') ?? $job->application_deadline }}"
                        class="form-control" id="application_deadline">
                </div>
                <div class="form-group">
                    <label for="jobdescription">Job Description</label>
                    <textarea class="form-control" id="jobdescription" rows="5" placeholder="Enter Job Description">{{ $job->jobdescription }}</textarea>
                </div>
                <div class="form-group">
                    <label for="responsibilities">Responsibilities</label>
                    <textarea class="form-control" id="responsibilities" rows="5" placeholder="Enter Job Responsibilities">{{ $job->responsibilities }}</textarea>
                </div>
                <div class="form-group">
                    <label for="education_experience">Education Experience</label>
                    <textarea class="form-control" id="education_experience" rows="5"
                        placeholder="Enter Your Educational Experience">{{ $job->education_experience }}</textarea>
                </div>
                <div class="form-group">
                    <label for="other_benifits">Other Benefits</label>
                    <textarea class="form-control" id="other_benifits" rows="5" placeholder="Enter Other Benefits">{{ $job->other_benifits }}</textarea>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="button" onclick ="update({{ $job->id }})" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>


@endsection

@section('script')

    <script>
        function update(id) {
            let formData = new FormData();
            formData.append('_method', 'put');
            formData.append('job_title', document.getElementById('job_title').value);
            if (document.getElementById('image').files[0] != undefined) {
                formData.append('image', document.getElementById('image').files[0]);
            }
            if (document.getElementById('logo').files[0] != undefined) {
                formData.append('logo', document.getElementById('logo').files[0]);
            }
            formData.append('job_region', document.getElementById('job_region').value);
            formData.append('company', document.getElementById('company').value);
            formData.append('job_type', document.getElementById('job_type').value);
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('vacancy', document.getElementById('vacancy').value);
            formData.append('salary', document.getElementById('salary').value);
            formData.append('experience', document.getElementById('experience').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('application_deadline', document.getElementById('application_deadline').value);
            formData.append('jobdescription', document.getElementById('jobdescription').value);
            formData.append('responsibilities', document.getElementById('responsibilities').value);
            formData.append('education_experience', document.getElementById('education_experience').value);
            formData.append('other_benifits', document.getElementById('other_benifits').value);
            axios.post('/admin/dashboard/jobs/' + id, formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);
                })
                .finally(function() {
                    // always executed
                });
        }
    </script>

@endsection
