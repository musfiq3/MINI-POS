<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = ['admin_id','user_id','challan_no','note','date'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
