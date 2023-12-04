@extends('layouts.backend-master')


@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile_tab" data-toggle="pill" href="#profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile_image_tab" data-toggle="pill" href="#profile_image">Change Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile_info_tab" data-toggle="pill" href="#profile_info">Profile Name & Email Change</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="change_password_tab" data-toggle="pill" href="#change_password">Change Password</a>
                        </li>
                    </ul>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row mt-4">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="profile">
                     <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset(Auth::user()->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="from-group mb-4">
                                        <input type="text" disabled value="Name : {{ Auth::user()->name }}" class="form-control">
                                    </div>
                                    <div class="from-group mb-4">
                                        <input type="text" disabled value="Email : {{ Auth::user()->email }}" class="form-control">
                                    </div>
                                    <div class="from-group mb-4">
                                        <input type="text" disabled value="Role : {{ Auth::user()->role == 1 ? "Admin" : "User"  }}" class="form-control">
                                    </div>
                                    <div class="from-group mb-4">
                                        <input type="text" disabled value="Created At : {{ Auth::user()->created_at->diffForHumans() }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div><!--end general detail-->
                <div class="tab-pane fade show" id="profile_image">
                    <div class="row">
                        <div class="col-md-4 m-auto">
                            <form action="{{ route('profile.image.edit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                <img id="img_id" width="100%" src="{{ asset(Auth::user()->image) }}" alt="">
                                <input type="file" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" class=" my-3 form-control" name="image">
                                <button class="btn btn-gradient-primary waves-effect waves-light">Change Image</button>
                            </form>
                        </div>
                    </div>

                </div><!--end general detail-->

                <div class="tab-pane fade" id="profile_info">
                     <div class="row">
                        <div class="col-md-10 m-auto">
                            <form action="{{ route('profile.content.edit') }}" method="post" >
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">Update Profile</button>
                                </div>
                            </form>
                        </div>
                     </div>
                </div><!--end education detail-->

                <div class="tab-pane fade" id="change_password">
                    <div class="row">
                        <div class="col-md-10 m-auto">
                            <form method="POST"  action="{{ route('password.change') }}" >
                                @csrf
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label ">Current Passord</label>
                                  <input type="password" placeholder="Enter your Current password" name="current_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('current_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label">New Password</label>
                                  <input type="password" placeholder="Enter your new password" name="new_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('new_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label">Confirm New Passord</label>
                                  <input type="password" placeholder="Enter your Confirm password" name="confirm_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('confirm_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button style="submit" class="btn btn-gradient-primary waves-effect waves-light">Update Password
                                </button></div>
                              </form>
                        </div>
                    </div>
                </div><!--end portfolio detail-->


            </div><!--end tab-content-->

        </div><!--end col-->
    </div><!--end row-->

@endsection
