@extends('users.user_layout')

@section('user_content')



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Purchases of {{$user -> name}} </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Challan No</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $totalItem = 0 ;
                    $grandTotal= 0 ;
                    ?>

                    @foreach($user->purchases as $purchase)


                            <td>{{$purchase->challan_no}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$purchase->date}}</td>
                            <td>
                                <?php
                                $itemQty = $purchase->items()->sum('quantity');
                                $totalItem += $itemQty;
                                echo $itemQty;
                                ?>
                            </td>
                            <td>
                                <?php
                                $total = $purchase->items()->sum('total');
                                $grandTotal += $total;
                                echo $total;
                                ?>
                            </td>
                            <td class="text-right">
                                <form method="POST" action="{{ route('user.purchases.destroy',[$user->id, $purchase->id] )}}">

                                    <a href="{{route('user.purchases.invoice_details', [$user->id, $purchase->id])}}" class="btn btn-primary btn-sm">
                                        Show
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Challan No</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>{{$totalItem}}</th>
                        <th>{{$grandTotal}}</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>




@stop

