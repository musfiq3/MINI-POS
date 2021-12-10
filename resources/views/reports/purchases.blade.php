@extends('layout.main')

@section('main_content')



    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2> Sales Reports </h2>
        </div>

        <div class="col-md-8 text-right">
            <form method="get" action="{{route('reports.purchases')}}">
                @csrf

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Start Date</label>
                        <input type="date" name="start_date" value="" class="form-control mb-2" id="date" placeholder="Start Date">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">End Date</label>
                        <div class="input-group mb-2">
                            <input type="date" name="end_date" value="" class="form-control" id="date" placeholder="End Date">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Purchases report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center"><b>Date</b></th>
                        <th class="text-center"><b>Products</b></th>
                        <th class="text-center"><b>Quantity</b></th>
                        <th class="text-center"><b>Price</b></th>
                        <th class="text-center"><b>Total</b></th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($purchases as $purchase)
                       <tr>
                            <td class="text-center">{{ $purchase->date }}</td>
                            <td class="text-center">{{ $purchase->title }}</td>
                            <td class="text-center">{{ $purchase->quantity }}</td>
                            <td class="text-right">{{ $purchase->price }}</td>
                            <td class="text-right">{{ $purchase->total }}</td>
                        </tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <th></th>
                        <th class="text-right">Total Items:</th>
                        <th class="text-center"><b>{{ $purchases->sum('quantity') }}</b></th>
                        <th class="text-right"><b>Total:</b></th>
                        <th class="text-right"><b>{{ $purchases->sum('total') }}</b></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop

