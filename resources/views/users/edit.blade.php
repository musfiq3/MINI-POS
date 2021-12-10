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

    <h3> Add New User </h3>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New User</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form method="post" action="{{route('users.update', $user->id)}}">
                        @csrf
                        @method('PUT')


                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>User Group</label>
                            <div class="col-sm-9">
                                <select name="group_id" class="form-control">

                                    <option value="0">Please Select</option>
                                    @foreach($groups as $value)
                                    <option {{$user->group_id == $value->id?"selected":""}} value="{{$value->id}}"> {{$value->title}}</option>
                                        @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$user -> name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{$user -> phone}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{$user -> email}}">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{$user -> address}}" >
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

