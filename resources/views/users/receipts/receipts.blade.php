@extends('users.user_layout')

@section('user_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Receipts of {{$user -> name}} </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>

                        <th>Admin</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>

                        <th colspan="2" class="text-right">Total</th>
                        <th class="text-center">{{$user->receipts->sum('amount')}}</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($user->receipts as $receipt)
                        <tr>

                            <td class="text-center">{{optional($receipt->admin)->name}}</td>
                            <td class="text-center">{{$receipt->date}}</td>
                            <td class="text-center">{{$receipt->amount}}</td>
                            <td>{{$receipt->note}}</td>
                            <td class="text-right">

                                <form method="post" action="{{ route('user.receipts.destroy' ,[$user->id, $receipt->id] )}}">

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

    {{-- Modal for Add New Receipts --}}


    <!-- Modal -->

    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.receipts.store', $user->id)}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> New Receipts </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label for="date" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Date</label>
                            <div class="col-sm-9">
                                <input type="text" name="date" class="form-control" id="date" placeholder="Date" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-sm-3 col-form-label">Note</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="note" class="form-control" rows="3" id="note" placeholder="Note"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>

        </div>
    </div>



@stop

