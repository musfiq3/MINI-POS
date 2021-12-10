@extends('users.user_layout')

@section('user_content')

{{--  Sales report  --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sales Reports </h6>
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

{{--  Purchase report  --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Purchases Reports </h6>
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

{{--  Receipts report  --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Receipts Reports </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
                <thead>
                <tr>

                    <th class="text-center">Date</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>

                <tbody>
                @foreach($receipts as $receipt)
                    <tr>
                        <td class="text-center">{{$receipt->date}}</td>
                        <td class="text-right">{{number_format($receipt->amount,2)}}</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <th class="text-right">Total</th>
                    <th class="text-right">{{ number_format($user->receipts->sum('amount'),2)}}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{{--  Payments report  --}}

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Payments Reports </h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
                <thead>
                <tr>

                    <th class="text-center">Date</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>

                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td class="text-center">{{$payment->date}}</td>
                        <td class="text-right">{{number_format($payment->amount,2)}}</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <th class="text-right">Total</th>
                    <th class="text-right">{{ number_format($user->payments->sum('amount'),2)}}</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@stop

