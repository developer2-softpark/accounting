<?php

namespace App\Model\Backend\Stock;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product\Product;
use App\Model\Backend\Product\ProductVariation;
use App\Model\Backend\Stock\Stock;
class SecondaryStock extends Model
{
    public function productVariations()
    {
        return $this->belongsTo(ProductVariation::class,'product_variation_id','id');
    }

    public function stocks()
    {
        return $this->belongsTo(Stock::class,'stock_id','id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
