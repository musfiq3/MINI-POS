<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
     protected $fillable = ['admin_id','user_id','sale_invoice_id','amount','date','note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function invoice()
    {
        return $this->belongsTo(SaleInvoice::class);
    }
}
