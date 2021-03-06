<?php

namespace App\Model\Backend\Stock;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product\Product;
use App\Model\Backend\Product\ProductVariation;
class MainStock extends Model
{

    public function productVariations()
    {
        return $this->belongsTo(ProductVariation::class,'product_variation_id','id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
