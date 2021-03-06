<?php

namespace App\Model\Backend\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\Weight;
use App\Models\Color;
use App\Model\Backend\Product\Product;
use App\Model\Backend\Unit\Unit;
use App\Model\Backend\Stock\MainStock;
use App\Model\Backend\Stock\PrimaryStock;
use App\Model\Backend\Stock\SecondaryStock;
class ProductVariation extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function colors()
    {
        return $this->belongsTo(Color::class,'color_id','id');
    }
    public function weights()
    {
        return $this->belongsTo(Weight::class,'weight_id','id');
    }

    
    public function defaultPurchaseUnits()
    {
        return $this->belongsTo(Unit::class,'default_purchase_unit_id','id');
    }
    public function defaultSaleUnits()
    {
        return $this->belongsTo(Unit::class,'default_sale_unit_id','id');
    }


    /**Stock */
    public function mainStocks()
    {
        return $this->HasOne(MainStock::class,'product_variation_id','id')->where('business_location_id',1);
    }
    public function primaryStocks()
    {
        return $this->HasOne(PrimaryStock::class,'product_variation_id','id')->where('business_location_id',1);
    }
    public function SecondaryStocks()
    {
        return $this->HasOne(SecondaryStock::class,'product_variation_id','id')->where('business_location_id',1);
    }
    /**Stock */
}
