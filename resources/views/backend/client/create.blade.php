@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-10 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Client</li>
                </ol>
            </div>
            <h4 class="page-title">Add New Client</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('client.store')  }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Client Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('client_name') is-invalid @enderror" name="client_name" placeholder="Enter client name" value="{{ old('client_name') }}">
                        @error('client_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('client_email') is-invalid @enderror" name="client_email" placeholder="Enter client email" value="{{ old('client_email') }}">
                        @error('client_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Password <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('client_password') is-invalid @enderror" name="client_password" placeholder="Enter client Password" value="{{ old('client_password') }}">
                        @error('client_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('client_phone') is-invalid @enderror" name="client_phone" placeholder="Enter client phone" value="{{ old('client_phone') }}">
                        @error('client_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Status <span class="text-danger">*</span></label>
                        <select name="client_status" class="form-control @error('client_status') is-invalid @enderror">
                            <option value>--Select Client--</option>
                            <option value="2">Customer</option>
                            <option value="3">Supplier</option>
                        </select>
                        @error('client_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">
                        Add Client
                    </button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection
