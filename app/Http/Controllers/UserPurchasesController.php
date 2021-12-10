<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Product;
use App\PurchaseInvoice;
use App\PurchaseItems;
use App\SaleItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPurchasesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['tab_menu'] = 'purchases';
    }


    public function index($id)
    {
        $this->data['user'] = User::findOrFail($id);

        return view('users.purchases.purchases',$this->data);
    }

    /**
     * Create New invoice for purchase
     * @param InvoiceRequest $request
     * @param  user ----   $user_id
     * @return array|\Illuminate\Http\RedirectResponse
     */

    public function createInvoice(InvoiceRequest $request, $user_id)
    {
        $formData             = $request->all();
        $formData['user_id']  = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice = PurchaseInvoice::create($formData);

        return redirect()->route('user.purchases.invoice_details',['id' => $user_id, 'invoice_id'=>$invoice->id] );
    }

    public function invoice($user_id,$invoice_id)
    {
        $this->data['user']     = User::findOrFail($user_id);
        $this->data['invoice']  = PurchaseInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::arrayForSelect();

        //dd($this->data['invoice']->items);

        return view('users.purchases.invoice', $this->data);
    }

    public function addItem(InvoiceProductRequest $request,$user_id,$invoice_id)
    {
        $formData                           = $request->all();
        $formData['purchase_invoice_id']    = $invoice_id;


        if (PurchaseItems::create($formData))
        {
            Session:: flash('message', 'Item added successfully');
        }

        return redirect()->route('user.purchases.invoice_details', ['id'=>$user_id, 'invoice_id'=>$invoice_id ]);
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {
        if (PurchaseItems::destroy($item_id))
        {
            Session:: flash('message', 'Item deleted successfully');
        }

        return redirect()-> route('user.purchases.invoice_details', ['id'=>$user_id, 'invoice_id'=>$invoice_id ]);
    }

    public function destroy($user_id,$invoice_id)
    {
        if(PurchaseInvoice::destroy($invoice_id))
        {
            Session::flash('message','Invoice deleted successfully');
        }

        return redirect()->route('user.purchases', $user_id);
    }
}
