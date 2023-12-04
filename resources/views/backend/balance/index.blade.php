@extends('layouts.backend-master')

@section('content')
<div class="row">
    <div class="col-sm-12 m-auto">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Balance</li>
                </ol>
            </div>
            <h4 class="page-title">Balance List</h4>
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
                        <th>Client</th>
                        <th>Income</th>
                        <th>Expense</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                @forelse ( $balances as $balance )

                    <tbody>

                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $balance->client->user->name }}</td>
                            <td>{{ $balance->income }}</td>
                            <td>{{ $balance->expense }}</td>
                            <td>{{ $balance->created_at->format('d M Y') }}</td>
                            <td>
                                <a  class="btn btn-danger text-white balanceDelete" data-id="{{ $balance->id }}" style="cursor: pointer">Delete Balance</a>
                                <a  class="btn btn-warning " href="{{ route('balance.edit', $balance->id) }}">Edit Balance</a>
                            </td>
                        </tr>
                        @empty
                            <div class="text-center">
                                <h2 style="color: red; font-weight: bold">Balance Not Found</h2>
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
    $(".balanceDelete").click(function(){
        let id = $(this).attr('data-id')
        swal({
            title: "Are you sure?",
            text: "Permanent delete this Balance !",
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
                        url: "/balance/delete/"+id,
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
