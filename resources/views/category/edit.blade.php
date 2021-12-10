@extends('layout.main')

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3> Add New Category </h3>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Category</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form method="post" action="{{route('categories.update', $categories->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Title</label>
                            <div class="col-sm-9">
                                <label>
                                    <input type="text" name="title" class="form-control"  placeholder="Title" value="{{$categories->title}}">
                                </label>
                            </div>
                        </div>


                        <div class="mt-4 text-right" >
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>

@stop

