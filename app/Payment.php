<?php

namespace App;

use App\Http\Requests\PaymentRequest;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['admin_id', 'user_id', 'date','amount', 'note','purchase_invoice_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}


