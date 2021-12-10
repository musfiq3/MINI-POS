@extends('layout.main')

@section('main_content')



    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2> Products </h2>
        </div>

        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{route('products.create')}}"> New Product </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Products </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>Has Stock</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th>Has Stock</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->cost_price}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{($product->has_stock == 1) ? 'Yes':'No' }}</td>

                            <td class="text-right">

                                <form method="POST" action="{{ route('products.destroy',$product->id )}}">

                                    <a href="{{route('products.show', $product->id)}}" class="btn btn-primary btn-sm">
                                        Show
                                    </a>
                                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-sm">
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

