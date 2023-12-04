@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-10">
        <div class="page-title-box">
            <h4 class="page-title">Add New Mail Text</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-body">
                @if ($totalMail >= 1)
                    <form action="{{ route('mail.update', $data->id ) }} " method="post">
                        @csrf
                        <textarea id="elm1" name="mail_text">{!! $data->mail_text !!}</textarea>
                        @error('mail_text')
                            <span>{{ $message }}</span>
                        @enderror

                        <button type="submit" class="mt-3 btn btn-gradient-primary waves-effect waves-light">Update</button>
                    </form>
                @else
                    <form action="{{ route('mail.store') }}" method="POST">
                        @csrf
                        <textarea id="elm1" name="mail_text"></textarea>
                        <button type="submit" class="mt-3 btn btn-gradient-primary waves-effect waves-light">Save</button>
                    </form>
                @endif
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div>
@endsection
