<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','title', 'description',  'cost_price', 'price', 'has_stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItems::class);
    }
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public static function arrayForSelect()
    {
        $arr = [];
        $products=Product::all();
        foreach ($products as $product)
        {
            $arr[$product->id]= $product->title;
        }

        return $arr;
    }

}
