
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
                                    <h4 class="mt-0 mb-3 mt-5">Let's Get Started Customer Management</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Customer Management.</p>
                                </div> <!--end auth-logo-text-->
                                @error('banned')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('login') }}">

                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-inbox"></i>
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
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->



                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                            </div><!--end /div-->

                            <div class="m-3 text-center text-muted">
                                <p class="">Don't have an account ?  <a href="{{ route('register') }}" class="text-primary ml-2">Free Resister</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    <div class="account-social text-center mt-4">
                        <h6 class="my-4">Or Login With</h6>
                        <ul class="list-inline mb-4">

                            <li class="list-inline-item">
                                <a href="{{ route('google.login') }}" class="lognwithgoogle">
                                    <i class="fab fa-google google"></i> <span>Login With Google</span>
                                </a>
                            </li>
                        </ul>
                    </div><!--end account-social-->
                </div><!--end auth-page-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Log In page -->
@include('auth.inc.footer')
