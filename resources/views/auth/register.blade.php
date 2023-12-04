@include('auth.inc.header')

    <!-- Log In page -->
    <div class="container">
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <img src="{{ asset('backend') }}/assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo">
                                </div><!--end auth-logo-box-->

                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Free Register for Customer Management</h4>
                                    <p class="text-muted mb-0">Get your free Customer account now.</p>
                                </div> <!--end auth-logo-text-->


                                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i>
                                            </span>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Username">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="conf_password">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock-open"></i>
                                            </span>
                                            <input type="password" value="{{ old('password_confirmation') }}" class="form-control @error('password') is-invalid  @enderror" id="conf_password" name="password_confirmation" placeholder="Enter Confirm Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label for="client_phone">Phone No</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                            <input type="text" name="client_phone" value="{{ old('client_phone') }}" class="form-control @error('client_phone') is-invalid @enderror" id="client_phone" placeholder="Enter Phone">
                                            @error('client_phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->


                                    <div class="form-group">
                                        <label for="conf_password">Select Role</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock-open"></i>
                                            </span>
                                           <select name="role" class="form-control @error('role') is-invalid  @enderror">
                                                <option value>--Select Role--</option>
                                                <option value="2">Customer</option>
                                                <option value="3">Supplier</option>
                                           </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                            </div><!--end /div-->

                            <div class="m-3 text-center text-muted">
                                <p class="">Already have an account ? <a href="{{ route('login') }}" class="text-primary ml-2">Log in</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-card-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->

 @include('auth.inc.footer')
