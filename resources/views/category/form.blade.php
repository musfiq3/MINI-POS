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

    <h3> {{$headline}} </h3>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> {{$headline}} </h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">

                    <form method="post" action="{{route('categories.store')}}">
                        @csrf

                        <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Title</label>
                        <div class="col-sm-9">
                            <label>
                                <input type="text"  class="form-control" name="title" placeholder="Title">
                            </label>
                        </div>
                    </div>


                    <div class="mt-4 text-right" >
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    </form>

                </div>

            </div>
        </div>

    </div>





@stop

