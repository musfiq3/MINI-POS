@extends('users.invoice_layout')

@section('user_content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sales Invoice Details </h6>
        </div>

        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <div class="no_padding"><b>Customer :</b> {{$user->name}}</div>
                    <div class="no_padding"><b>Email :</b> {{$user->email}}</div>
                    <div class="no_padding"><b>Phone :</b> {{$user->phone}}</div>
                </div>

                <div class="col-md-4">
                    <div class="no_padding"><b>Date: </b>{{$invoice->date}}</div>
                    <div class="no_padding"><b>Challan No:</b> {{$invoice->challan_no}}</div>
                </div>
            </div>
            <div class="invoice_item">
                <table class="table">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>

                    </thead>
                    <tbody>
                    @foreach($invoice->items as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->product->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td class="text-right">{{$item->total}}</td>
                        <td class="text-right">
                            <form method="POST" action="{{route('user.sales.delete_item',[$user->id, $invoice->id, $item->id])}}">

                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tr>
                        <th></th>
                        <th>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct">
                                Add Product
                            </button>
                        </th>
                        <th colspan="2" class="text-right">Total :</th>
                        <th class="text-right">{{$totalPayable = $invoice->items()->sum('total')}}</th>
                    </tr>

                    <tr>
                    <th></th>
                    <th>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newReceiptForInvoice">
                            Add Receipt
                        </button>
                    </th>
                    <th colspan="2" class="text-right">Paid :</th>
                    <th class="text-right">{{$totalPaid = $invoice->receipts()->sum('amount')}}</th>
                    </tr>

                    <tr>

                    <th colspan="4" class="text-right">Due :</th>
                    <th class="text-right">{{$totalPayable - $totalPaid }}</th>
                    </tr>

                </table>

            </div>
        </div>
    </div>


    {{-- Modal for Add New Product --}}


    <!-- Modal -->

    <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.sales.add_item',[$user->id, $invoice->id] )}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newProductModalLabel"> New Product </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label text-right"><span class="text-danger">*</span>Product</label>
                            <div class="col-sm-9">
                                <select name="product_id" class="form-control">
                                    <option value="0">Please Select</option>
                                    @foreach($products as $key=>$value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" onkeyup="getTotal()" class="col-sm-3 col-form-label text-right"><span class="text-danger">*</span>Unit Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control" id="price" onkeyup="getTotal()" placeholder="Unit Price", required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" onkeyup="getTotal()" class="col-sm-3 col-form-label text-right"><span class="text-danger">*</span>Quantity</label>
                            <div class="col-sm-9">
                                <input type="text" name="quantity" class="form-control" id="quantity" onkeyup="getTotal()" placeholder="Quantity" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-sm-3 col-form-label text-right"><span class="text-danger">*</span>Total</label>
                            <div class="col-sm-9">
                                <input type="text" name="total" class="form-control" id="total" placeholder="Total" required>
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

    {{-- Modal for New Receipts for Invoice --}}


    <!-- Modal -->



    <div class="modal fade" id="newReceiptForInvoice" tabindex="-1" role="dialog" aria-labelledby="newReceiptForInvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form method="post" action="{{route('user.receipts.store', [$user->id,$invoice->id])}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newReceiptForInvoiceModalLabel"> New Receipts For This Invoice </h5>

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

    <script type="text/javascript">
        function getTotal() {
            var price =document.getElementById("price").value;
            var quantity =document.getElementById("quantity").value;

            if (price && quantity){
                var total = price * quantity;
                document.getElementById("total").value = total;
            }
        }
    </script>

@stop
