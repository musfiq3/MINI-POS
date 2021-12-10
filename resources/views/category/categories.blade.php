@extends('layout.main')

@section('main_content')



    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Categories </h2>
        </div>

        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{route('categories.create')}}"> New Category </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Categories </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td class="text-right">

                                <form method="POST" action="{{ route('categories.destroy',$category->id )}}">

                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">Delete</button>
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

