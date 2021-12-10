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


                    {!! Form::open([ 'route' => 'users.store', 'method' => 'post' ]) !!}


                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>User Group</label>
                        <div class="col-sm-9">

                            {{Form::select('group_id', $groups, NUll, ['class'=>'form-control','id'=>'group','placeholder'=>'Select Group'])}}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email" >

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control" id="address" placeholder="Address" >
                        </div>
                    </div>


                        <div class="mt-4 text-right" >
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        {!! Form::close() !!}

                </div>

            </div>
        </div>

        </div>





@stop

