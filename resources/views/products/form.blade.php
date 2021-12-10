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
                <div class="col-md-10">


                    {!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}


                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label"><span class="text-danger">*</span>Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label"><span class="text-danger">*</span>Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"></textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label"><span class="text-danger">*</span>Category</label>
                        <div class="col-sm-5">
                            <select name="category_id" class="form-control">
                                <option value="0">Please Select</option>
                                @foreach($categories as $value)
                                    <option value="{{ $value->id  }}">{{ $value->title  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="cost_price" class="col-sm-2 col-form-label">Cost Price</label>
                        <div class="col-sm-5">
                            <input type="text" name="cost_price" class="form-control" id="cost_price" placeholder="Cost Price" >

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Sale Price</label>
                        <div class="col-sm-5">
                            <input type="text" name="price" class="form-control" id="price" placeholder="Sale Price" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label"> Has Stock</label>
                        <div class="col-sm-2">
                            <select name="has_stock" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                          </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>


                    <div class="mt-4 text-right" >

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>

    </div>





@stop

