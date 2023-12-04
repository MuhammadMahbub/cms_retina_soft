@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-10 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Client</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('client.update', $client->id )  }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Client Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('client_name') is-invalid @enderror" value="{{ $client->client_name }}" name="client_name" placeholder="Enter client name">
                        @error('client_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('client_email') is-invalid @enderror" value="{{ $client->email }}" name="client_email" placeholder="Enter client email">
                        @error('client_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Client Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('client_phone') is-invalid @enderror" value="{{ $client->phone }}" name="client_phone" placeholder="Enter client phone">
                        @error('client_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">
                        Update Client
                    </button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection
