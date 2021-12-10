@extends('layout.main')

@section('main_content')



    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Users </h2>
        </div>

        <div class="col-md-6 text-right">

            <a class="btn btn-info" href="{{route('users.create')}}"> New User </a>

        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Users </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Group</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{optional($user->group)->title}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td class="text-right">

                                <form method="POST" action="{{ route('users.destroy',$user->id )}}">

                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-primary btn-sm">
                                        Show
                                    </a>
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    @if($user->sales()->count()==0
                                    && $user->purchases()->count()==0
                                    && $user->receipts()->count()==0
                                    && $user->payments()->count()==0)
                                    @endif
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </form>

                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

