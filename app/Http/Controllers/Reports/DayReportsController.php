<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Payment;
use App\PurchaseItems;
use App\Receipt;
use App\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DayReportsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu']= 'Reports';
        $this->data['sub_menu'] = 'Days';
    }

    public function index(Request $request)
    {
        $this->data['start_date'] = $request->get('start_date', date('y-m-d'));
        $this->data['end_date']   = $request->get('end_date', date('y-m-d'));

        $this->data['sales'] = SaleItem::select('products.title', DB::raw( 'SUM(sale_items.quantity) as quantity, AVG(sale_items.price) as price, SUM(sale_items.total) as total') )
                        ->join('products', 'sale_items.product_id', '=', 'products.id')
                        ->join('sale_invoices', 'sale_items.sale_invoice_id', '=', 'sale_invoices.id')
                        ->whereBetween('sale_invoices.date', [ $this->data['start_date'], $this->data['end_date'] ])
                        ->where('products.has_stock', 1)
                        ->groupBy('products.title')
                        ->get();

        $this->data['purchases'] = PurchaseItems::select('products.title', DB::raw( 'SUM(purchase_items.quantity) as quantity, AVG(purchase_items.price) as price, SUM(purchase_items.total) as total'))
                        ->join('products', 'purchase_items.product_id', '=', 'products.id')
                        ->join('purchase_invoices', 'purchase_items.purchase_invoice_id', '=', 'purchase_invoices.id')
                        ->whereBetween('purchase_invoices.date', [$this->data['start_date'], $this->data['end_date']])
                        ->where('products.has_stock', 1)
                        ->groupBy('products.title')
                        ->get();

        $this->data['receipts'] = Receipt::select('users.name',DB::raw('SUM(receipts.amount) as amount'))
                        ->join('users','receipts.user_id', '=', 'users.id')
                        ->whereBetween('date', [$this->data['start_date'], $this->data['end_date']])
                        ->groupBy('users.name')
                        ->get();

        $this->data['payments'] = Payment::select('users.name',DB::raw('SUM(payments.amount) as amount'))
                        ->join('users','payments.user_id', '=', 'users.id')
                        ->whereBetween('date', [$this->data['start_date'], $this->data['end_date']])
                        ->groupBy('users.name')
                        ->get();


        return view('reports.days', $this->data);

    }
}
