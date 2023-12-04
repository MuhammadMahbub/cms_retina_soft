@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-10 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Balance</li>
                </ol>
            </div>
            <h4 class="page-title">Add New Balance</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('balance.update', $balance->id)  }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method("PUT")
                    
                    <div class="form-group">
                        <label>Client <span class="text-danger">*</span></label>
                        <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                            <option value>--Select Client--</option>
                            @foreach ($clients as $client) 
                                <option {{ $balance->client_id === $client->user_id ? 'selected' : '' }} value="{{ $client->user_id }}">{{ $client->user->name }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Income </label>
                        <input type="text" class="form-control" name="income" placeholder="0" value="{{ $balance->income }}">
                    </div>
                    <div class="form-group">
                        <label>Expense </label>
                        <input type="text" class="form-control" name="expense" placeholder="0" value="{{ $balance->expense }}">
                    </div>
                    <!--end form-group-->
                    <button type="submit" class="btn btn-gradient-primary waves-effect waves-light">
                        Update Balance
                    </button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection
