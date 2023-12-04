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
            <h4 class="page-title">Client List</h4>
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
                        <th>Client Phone</th>
                        <th>Client Income</th>
                        <th>Client Expenses</th>
                        <th>Final Balance</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                @forelse ( $clients as $client )

                    <tbody>

                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $client->user->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>
                                @if ($client->client_income === null)
                                    <span>0</span>
                                @else
                                    <span>{{ $client->client_income }} </span>
                                @endif
                            </td>
                            <td>
                                @if ($client->client_expense === null)
                                    <span>0</span>
                                @else
                                    <span>{{ $client->client_expense }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($client->balance_diff === null)
                                    <span>0</span>
                                @else
                                    <span>{{ $client->balance_diff }}</span>
                                    @if ($client->balance_diff < 0)
                                        <span class="badge badge-danger ml-2">Negative Balance</span>
                                    @else
                                        <span class="badge badge-primary ml-2">Positive Balance</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a  class="btn btn-danger mr-3" href="{{ route('client.delete', $client->id) }}">Delete Client</a>
                                <a  class="btn btn-warning " href="{{ route('client.edit', $client->id) }}">Edit Client</a>
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
