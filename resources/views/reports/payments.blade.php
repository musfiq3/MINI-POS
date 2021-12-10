@extends('layout.main')

@section('main_content')



    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2> Payments Reports </h2>
        </div>

        <div class="col-md-8 text-right">
            <form method="get" action="{{route('reports.payments')}}">
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
            <h6 class="m-0 font-weight-bold text-primary"> Payments report from <b>{{$start_date}}</b> to <b>{{$end_date}}</b></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-striped" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-center"><b>Date</b></th>
                        <th class="text-center"><b>User</b></th>
                        <th class="text-center"><b>Amount</b></th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($payments as $payment)
                       <tr>
                            <td class="text-center">{{ $payment->date }}</td>
                            <td class="text-center">{{optional($payment->user)->name }}</td>
                            <td class="text-right">{{ $payment->amount }}</td>
                        </tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <th colspan="2" class="text-right"><b>Total :</b></th>
                        <th class="text-right"><b>{{$payments->sum('amount')}}</b></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop

