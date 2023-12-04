
@include('auth.inc.header')
<style>
    .account-body .auth-page {
    text-align: center;
    max-width: 700px;
    position: relative;
    margin: 0 auto;
}
.home_title {
    font-size: 40px;
    line-height: 56px;
    font-weight: 900;
}
.home_title {
    font-size: 32px !important;
    line-height: 56px;
    font-weight: 900;
}
</style>
<!-- Log In page -->
<div class="container">
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body" style="padding: 40px 45px">
                            <h3 class="mb-4 home_title">Welcome To <br> Customer Management Software</h3>
                            <a class="d-block btn btn-primary mb-3" href="{{ route('login') }}">Login</a>
                            <a class="d-block btn btn-success" href="{{ route('register') }}">Register</a>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-page-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
<!-- End Log In page -->
@include('auth.inc.footer')
