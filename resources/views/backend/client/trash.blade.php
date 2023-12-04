@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-12 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Client</li>
                </ol>
            </div>
            <h4 class="page-title">Trash Client List</h4>
        </div><!--end page-title-box-->
    </div><!--end col-->
</div>
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>SL.NO</th>
                        <th>Client Name</th>
                        <th>Client Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_clients as $client)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>
                                <img src="{{ asset($client->user->image) }}" width="50px" alt="client_image">
                            </td>

                            <td>
                                <a class="btn btn-danger text-white permanentDelete" data-id="{{ $client->id }}" >Permanent Delete</a>
                                <a  class="btn btn-warning " href="{{ route('trash.restore', $client->id) }}">Restore Client</a>
                            </td>
                        </tr>
                        @empty
                        <div class="text-center">
                            <h2 style="color: red; font-weight: bold">Client Not Found</h2>
                        </div>
                        @endforelse

                    </tbody>
                  </table>
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
</div>
@endsection


@section('scripts')

<script type="text/javascript">
    $(".permanentDelete").click(function(){
        let id = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "Permanent delete this Client !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
                $.ajax({
                        type:'GET',
                        url: "/client/permanent-delete/"+id,
                        dataType: 'json',
                        success: function(data){
                            setInterval(() => {
                                window.location.reload(true);
                            }, 1000);

                        },
                        error: function(data){
                            console.log(data);
                        }
                    })
            } else {
                swal("Your imaginary file is safe!");
            }
            });
        })
</script>
@endsection
