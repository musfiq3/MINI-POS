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

    <h3> Add New Product </h3>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <form method="post" action="{{route('products.update', $products->id)}}">
                        @csrf
                        @method('PUT')


                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Title</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$products->title}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Description</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="description" class="form-control" id="description" placeholder="Description">{{$products->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Category</label>
                            <div class="col-sm-5">

                                {{Form::select('category_id', $categories, $products->category_id, ['class'=>'form-control','id'=>'category','placeholder'=>'Select Category'])}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cost_price" class="col-sm-3 col-form-label">Cost Price</label>
                            <div class="col-sm-5">
                                <input type="text" name="cost_price" class="form-control" id="cost_price" placeholder="Cost Price" value="{{$products->cost_price}}">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-sm-3 col-form-label">Sale Price</label>
                            <div class="col-sm-5">
                                <input type="text" name="price" class="form-control" id="price" placeholder="Sale Price" value="{{$products->price}}" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label"> Has Stock </label>
                            <div class="col-sm-5">
                                <select name="has_stock" class="form-control">
                                    <option value="">Please Select</option>
                                    <option {{1 == $products->has_stock?"selected":""}} value="1" >Yes</option>
                                    <option {{0 == $products->has_stock?"selected":""}} value="0" >No</option>
                                </select>
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

