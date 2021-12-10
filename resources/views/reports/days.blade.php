@extends('layout.main')

@section('main_content')



{{--Report of Sales--}}

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2> Day Reports </h2>
        </div>

        <div class="col-md-8 text-right">
            <form method="get" action="{{route('reports.days')}}">
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

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Sales </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($sales->sum('total'),2) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Purchases </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($purchases->sum('total'),2)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Receipts </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($receipts->sum('amount'), 2)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total Payments </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($payments->sum('amount'), 2)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sales report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-striped table-sm" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center"><b>Products</b></th>
                        <th class="text-center"><b>Quantity</b></th>
                        <th class="text-center"><b>Price</b></th>
                        <th class="text-center"><b>Total</b></th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($sales as $sale)
                       <tr>
                            <td class="text-center">{{ $sale->title }}</td>
                            <td class="text-center">{{ $sale->quantity }}</td>
                            <td class="text-right">{{ number_format($sale->price,2) }}</td>
                            <td class="text-right">{{ number_format($sale->total,2) }}</td>
                        </tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <th class="text-right">Total Items:</th>
                        <th class="text-center"><b>{{ $sales->sum('quantity') }}</b></th>
                        <th class="text-right"><b>Total:</b></th>
                        <th class="text-right"><b>{{ number_format($sales->sum('total'),2) }}</b></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



   {{-- Purchase Reports  --}}


    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Purchases report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-sm" cellspacing="0">
                <thead>
                <tr>

                    <th class="text-center"><b>Products</b></th>
                    <th class="text-center"><b>Quantity</b></th>
                    <th class="text-center"><b>Price</b></th>
                    <th class="text-center"><b>Total</b></th>
                </tr>
                </thead>
                <tbody>

                @foreach($purchases as $purchase)
                    <tr>

                        <td class="text-center">{{ $purchase->title }}</td>
                        <td class="text-center">{{ $purchase->quantity }}</td>
                        <td class="text-right">{{ number_format($purchase->price, 2) }}</td>
                        <td class="text-right">{{ number_format($purchase->total, 2) }}</td>
                    </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>

                    <th class="text-right">Total Items:</th>
                    <th class="text-center"><b>{{ $purchases->sum('quantity') }}</b></th>
                    <th class="text-right"><b>Total:</b></th>
                    <th class="text-right"><b>{{ number_format($purchases->sum('total'),2) }}</b></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{{-- Receipts Reports  --}}


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Receipts report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-sm" cellspacing="0">
                <thead>
                <tr>

                    <th class="text-center"><b>User</b></th>
                    <th class="text-center"><b>Amount</b></th>
                </tr>
                </thead>
                <tbody>

                @foreach($receipts as $receipt)
                    <tr>
                        <td class="text-center">{{$receipt->name }}</td>
                        <td class="text-right">{{ number_format($receipt->amount, 2) }}</td>
                    </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>
                    <th  class="text-right"><b>Total :</b></th>
                    <th class="text-right"><b>{{ number_format($receipts->sum('amount'), 2)}}</b></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


{{-- Payments Reports  --}}


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Payments report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-striped table-sm" cellspacing="0">
                <thead>
                <tr>

                    <th class="text-center"><b>User</b></th>
                    <th class="text-center"><b>Amount</b></th>
                </tr>
                </thead>
                <tbody>

                @foreach($payments as $payment)
                    <tr>
                        <td class="text-center">{{$payment->name }}</td>
                        <td class="text-right">{{ number_format($payment->amount, 2) }}</td>
                    </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>
                    <th  class="text-right"><b>Total :</b></th>
                    <th class="text-right"><b>{{ number_format($payments->sum('amount'), 2)}}</b></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@stop

