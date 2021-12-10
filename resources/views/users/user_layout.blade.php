@extends('layout.main')



@section('main_content')

    @yield('user_card')

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <a class="btn btn-success" href="{{route('users.index')}}"> < Back </a>
        </div>

        <div class="col-md-8 text-right">

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
                New Sale
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                New Payment
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
                New Purchase
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                New Receipt
            </button>

        </div>
    </div>




    @include('users.user_layout_content')


    {{-- Modal for Add New Payment --}}


    <!-- Modal -->

    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.payments.store', $user->id)}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPaymentModalLabel"> New Payment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="row mb-3">
                            <label for="date" class="col-sm-3 col-form-label"><span class="text-danger">*</span>Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
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


    {{-- Modal for Add New Receipts --}}


    <!-- Modal -->

    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.receipts.store', $user->id)}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newReceiptModalLabel"> New Receipts </h5>

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


    {{-- Modal for  New Sales Invoice --}}


    <!-- Modal -->

    <div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.sales.store', $user->id)}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSaleModalLabel"> New Sale Invoice </h5>

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
                            <label for="challan_no" class="col-sm-3 col-form-label">Challan No</label>
                            <div class="col-sm-9">
                                <input type="text" name="challan_no" class="form-control" id="challan_no" placeholder="Challan No">
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


    {{-- Modal for  New Purchase Invoice --}}


    <!-- Modal -->

    <div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.purchases.store', $user->id)}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newPurchaseModalLabel"> New Purchase Invoice </h5>

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
                            <label for="challan_no" class="col-sm-3 col-form-label">Challan No</label>
                            <div class="col-sm-9">
                                <input type="text" name="challan_no" class="form-control" id="challan_no" placeholder="Challan No">
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

