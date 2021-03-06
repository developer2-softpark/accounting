<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Model\Backend\Product\ProductVariation;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /** purchase cartIfExist */
    public function purchaseCartIfExist(Request $request)
    {
        $productPurchaseCart = session()->has('productPurchaseCart') ? session()->get('productPurchaseCart')  : [];
        if($productPurchaseCart)
        {
            return view('backend.purchase.ajax.add_to_cart_list');
        }else{
            return false;
        }
    }



    public function searchingProductByAjax(Request $request)
    {
        $search = $request->pNameSkuBarCode;
        $query =  ProductVariation::query();
        $query->join('products','products.id','=','product_variations.product_id');

        $query->where('products.name','like','%'.$search.'%');
            $query->orWhere(function($q)use ($search){
                  return  $q->orWhere('products.sku','like','%'.$search.'%');
                });
            $query->orWhere(function($q)use ($search){
               return $q->orWhere('products.bar_code','like','%'.$search.'%');
            });
            $query->select('product_variations.*','product_variations.id as productVarId',
                'products.id as productId','products.name as productName','products.brand_id','products.category_id',
                'products.product_sku as sku'
            );
        $count = $query->count();
        if($count == 1)
        {   
            //make cart
            $productVariation =  $query->first();
           $this->addToCartWithSessionDuringSearchingTime($productVariation);
           $html =  view('backend.purchase.ajax.add_to_cart_list')->render();
           return response()->json([
                'status'    => true,
                'match'     =>'single',
                'data'      => $html
            ]);

        }else if($count > 1){
            // show dropdown list
            $products = $query->get(); 
            $output = '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="display:block;position:relation;">';
            foreach($products as $product) 
            {
                $sizeName = NULL;$weightName = NULL;$colorName = NULL;
                if($product->sizes) $sizeName = " - ".$product->sizes->name;
                if($product->colors) $colorName = " - ".$product->colors->name;
                if($product->weights) $weightName = " - ".$product->weights->name;
                $productName = $product->productName . $sizeName . $colorName . $weightName;

                $output .='<li><a href="#" data-id="'.$product->productVarId.'" class="dropdown-item dropdown_class">'.$productName.'</a> </li>';
            }
            $output .= "</ul>";
			//return $output;
            return response()->json([
                'status'    => true,
                'match'     =>'multiple',
                'data'      => $output
            ]);

        }
        else{
            return false;
        }

    }


    public function addToCartSingleProductByResultOfSearchingByAjax(Request $request)
    {
        $id = $request->pNameSkuBarCode;
        $query =  ProductVariation::query();
        $query->join('products','products.id','=','product_variations.product_id');
        $query->where('product_variations.id',$id);
            $query->select('product_variations.*','product_variations.id as productVarId',
                'products.id as productId','products.name as productName','products.brand_id','products.category_id',
                'products.product_sku as sku'
            );
        $productVariation = $query->first();
        $this->addToCartWithSessionDuringSearchingTime($productVariation);
        $html =  view('backend.purchase.ajax.add_to_cart_list')->render();
        return response()->json([
             'status'    => true,
             'match'     =>'single',
             'data'      => $html
         ]);
    }


    /*
    |------------------------------------------------------------------
    | add to cart during searching time
    |------------------------------------------------------------ 
    */
        /**from pulling product by ajax */
        public function addToCartWithSessionDuringSearchingTime($productVar)
        {
            $productPurchaseCart = [];
            $productPurchaseCart = session()->has('productPurchaseCart') ? session()->get('productPurchaseCart')  : [];
            //$product =  //Order::where('orderuid',$orderuid)->first();
            if($productVar)
            {       
                    $sizeName = NULL;$weightName = NULL;$colorName = NULL;
                    if($productVar->sizes) $sizeName = " - ".$productVar->sizes->name;
                    if($productVar->colors) $colorName = " - ".$productVar->colors->name;
                    if($productVar->weights) $weightName = " - ".$productVar->weights->name;
                    $productName = $productVar->productName . $sizeName . $colorName . $weightName;
                    if(array_key_exists($productVar->productVarId,$productPurchaseCart))
                    {
                        //$productPurchaseCart[$order->id]['total_price'] = $productPurchaseCart[$order->id]['quantity'] * $productPurchaseCart[$order->id]['unit_price'];
                        //$productPurchaseCart[$productVar->productVarId]['product_var_id'] = $product_var_id;
                        $productPurchaseCart[$productVar->productVarId]['product_name'] = $productName;

                        $quantity = $productPurchaseCart[$productVar->productVarId]['purchase_quantity'] + 1;
                        $productPurchaseCart[$productVar->productVarId]['purchase_quantity'] = $quantity;
                        //$productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_discount'] = $productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_discount'];
                        //$productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_tax'] = $purchase_unit_price_before_tax;
                        $productPurchaseCart[$productVar->productVarId]['sub_total_before_tax'] = $productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_tax'] * $quantity;
                        //$productPurchaseCart[$productVar->productVarId]['applicable_tax_for_purchase'] = $productVar->applicable_tax_for_purchase;
                        //$productPurchaseCart[$productVar->productVarId]['discount_value_in_parcent'] = $discount_value_in_parcent;
                        $purchaseAmountBeforeTaxAmount = $productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_tax'];
                        $taxApllicable  = $productPurchaseCart[$productVar->productVarId]['applicable_tax_for_purchase'];
                        $taxApplicableValue  = $productPurchaseCart[$productVar->productVarId]['product_tax'];
                        $taxApplicableNewValue = $taxApllicable == 1 ? $taxApplicableValue : 0;
                        $taxAmount = $purchaseAmountBeforeTaxAmount *  $taxApplicableNewValue / 100;

                        $productPurchaseCart[$productVar->productVarId]['net_purchase_amount'] = $purchaseAmountBeforeTaxAmount + $taxAmount;
                        $productPurchaseCart[$productVar->productVarId]['line_total'] = ($purchaseAmountBeforeTaxAmount + $taxAmount ) * $quantity;
                        //$productPurchaseCart[$productVar->productVarId]['profit_margin_parcent'] = $profit_margin_parcent;
                        //$productPurchaseCart[$productVar->productVarId]['unit_selling_price_inc_tax'] = $unit_selling_price_inc_tax;
                    }
                    else{
                        $productPurchaseCart[$productVar->productVarId] = [
                        'product_var_id' => $productVar->productVarId,
                        'product_name' => $productName ,
                        'product_id' => $productVar->productId,
                        'default_purchase_unit_id' => $productVar->default_purchase_unit_id,
                        'default_sale_unit_id' => $productVar->default_sale_unit_id,
                        'default_purchase_unit' => $productVar->defaultPurchaseUnits?$productVar->defaultPurchaseUnits->short_name:NULL,
                        'purchase_quantity' => 1,
                        'purchase_unit_price_before_discount' => number_format($productVar->purchase_unit_price_before_discount,2,'.', ''),
                        'purchase_unit_price_before_tax' => number_format($productVar->purchase_unit_price_before_tax,2,'.', ''),
                        'sub_total_before_tax' => number_format(($productVar->purchase_unit_price_before_tax * 1),2,'.', ''),

                        'applicable_tax_for_purchase' => $productVar->applicable_tax_for_purchase,
                        'product_tax' => $productVar->applicable_tax_for_purchase == 1 ? $productVar->purchase_tax_amount : 0,

                        'discount_value_in_parcent' => 0,
                        'net_purchase_amount' => number_format($productVar->purchase_unit_price_before_tax,2,'.', ''),
                        'line_total' => number_format(($productVar->purchase_unit_price_before_tax * 1),2,'.', ''),

                        'profit_margin_parcent' => defaultProfitMargin_HH(),
                        'unit_selling_price_inc_tax' => number_format(  ( (($productVar->purchase_unit_price_before_tax * 1) * defaultProfitMargin_HH() /100) + $productVar->purchase_unit_price_before_tax * 1),2,'.', ''),
                    ];
                }
                session(['productPurchaseCart' => $productPurchaseCart]);
            }
        }
    /*
    |------------------------------------------------------------------
    | add to cart during searching time
    |------------------------------------------------------------ 
    */




    /*
    |-------------------------------------------------------------------------------------------------------------
    | Pulling Product by Ajax with session , cart
    |------------------------------------------------------------------------------------
    */
        public function pullingProductByAjax(Request $request)
        {
            $alertQuantity = lowQuantityPullProduct_HH();
            if($request->alert_quantity)
            {
                $alertQuantity = $request->alert_quantity;
            }
            $unit_id        =  $request->unit_id;
            $category_id    =  $request->category_id;
            $brand_id       =  $request->brand_id;

            $query = ProductVariation::query();
                    $query->join('products','products.id','=','product_variations.product_id');
                    $query->where('product_variations.alert_quantity','<=',$alertQuantity);
                    if($unit_id)
                    {
                        $query->where('products.purchase_unit_id' , '=' , $unit_id);
                    }
                    if($category_id)
                    {
                        $query->where('products.category_id' , '=', $category_id);
                    }
                    if($brand_id)
                    {
                        $query->where('products.brand_id' , '=' , $brand_id);
                    }
                $query->select('product_variations.*','product_variations.id as productVarId',
                            'products.id as productId','products.name as productName','products.brand_id','products.category_id','products.purchase_unit_id',
                            'products.sale_unit_id','products.product_sku as sku'
                        );
            $data = $query->get();
        
            foreach ($data as $key => $value) 
            {
                $this->addToSessionForCart($value);
            }
            
            return view('backend.purchase.ajax.add_to_cart_list');

        }


        /**from pulling product by ajax */
        public function addToSessionForCart($productVar)
        {
            $productPurchaseCart = [];
            $productPurchaseCart = session()->has('productPurchaseCart') ? session()->get('productPurchaseCart')  : [];
            //$product =  //Order::where('orderuid',$orderuid)->first();
            if($productVar)
            {       
                    $sizeName = NULL;$weightName = NULL;$colorName = NULL;
                    if($productVar->sizes) $sizeName = " - ".$productVar->sizes->name;
                    if($productVar->colors) $colorName = " - ".$productVar->colors->name;
                    if($productVar->weights) $weightName = " - ".$productVar->weights->name;
                    $productName = $productVar->productName . $sizeName . $colorName . $weightName;
                if(array_key_exists($productVar->productVarId,$productPurchaseCart))
                    {
                        //$productPurchaseCart[$order->id]['total_price'] = $productPurchaseCart[$order->id]['quantity'] * $productPurchaseCart[$order->id]['unit_price'];
                    }
                else{
                    $productPurchaseCart[$productVar->productVarId] = [
                        'product_var_id' => $productVar->productVarId,
                        'product_name' => $productName ,
                        'product_id' => $productVar->productId,
                        'default_purchase_unit_id' => $productVar->default_purchase_unit_id,
                        'default_sale_unit_id' => $productVar->default_sale_unit_id,
                        'default_purchase_unit' => $productVar->defaultPurchaseUnits?$productVar->defaultPurchaseUnits->short_name:NULL,
                        'purchase_quantity' => 1,
                        'purchase_unit_price_before_discount' => number_format($productVar->purchase_unit_price_before_discount,2,'.', ''),
                        'purchase_unit_price_before_tax' => number_format($productVar->purchase_unit_price_before_tax,2,'.', ''),
                        'sub_total_before_tax' => number_format(($productVar->purchase_unit_price_before_tax * 1),2,'.', ''),

                        'applicable_tax_for_purchase' => $productVar->applicable_tax_for_purchase,
                        'product_tax' => $productVar->applicable_tax_for_purchase == 1 ? $productVar->purchase_tax_amount : 0,

                        'discount_value_in_parcent' => 0,
                        'net_purchase_amount' => number_format($productVar->purchase_unit_price_before_tax,2,'.', ''),
                        'line_total' => number_format(($productVar->purchase_unit_price_before_tax * 1),2,'.', ''),

                        'profit_margin_parcent' => defaultProfitMargin_HH(),
                        'unit_selling_price_inc_tax' => number_format(((($productVar->purchase_unit_price_before_tax * 1) * defaultProfitMargin_HH() /100) + $productVar->purchase_unit_price_before_tax * 1),2,'.', ''),
                    ];
                }
                session(['productPurchaseCart' => $productPurchaseCart]);
            }
            return true;
        }
    /*
    |------------------------------------------------------------------------------------
    | Pulling Product by Ajax with session , cart END
    |--------------------------------------------------------------------------------------------------------------
    */


    
    /* cart / Session single update from field keyup event */
    public function updateSinglePurchaseCartByAjax(Request $request)
    {
        $product_var_id                     =  $request->product_var_id;
        $purchase_quantity                  =  $request->purchase_quantity;
        $purchase_unit_price_before_discount=  number_format($request->purchase_unit_price_before_discount,2,'.', '');
        $discount_value_in_parcent          =  number_format($request->discount_value_in_parcent,2,'.', '');
        $purchase_unit_price_before_tax     =  number_format($request->purchase_unit_price_before_tax,2,'.', '');
        $sub_total_before_tax               =  number_format($request->sub_total_before_tax,2,'.', '');
        $product_tax                        =  number_format($request->product_tax,2,'.', '');
        $net_purchase_amount                =  number_format($request->net_purchase_amount,2,'.', '');
        $line_total                         =  number_format($request->line_total,2,'.', '');
        $profit_margin_parcent              =  $request->profit_margin_parcent;
        $unit_selling_price_inc_tax         =  number_format($request->unit_selling_price_inc_tax,2,'.', '');

        $productPurchaseCart = [];
        $productPurchaseCart = session()->has('productPurchaseCart') ? session()->get('productPurchaseCart')  : [];
        $query =  ProductVariation::query();
                $query->join('products','products.id','=','product_variations.product_id');
                $query->where('product_variations.id',$product_var_id);
        $productVar = $query->select('product_variations.*','product_variations.id as productVarId',
                        'products.id as productId','products.name','products.brand_id','products.category_id','products.purchase_unit_id',
                        'products.sale_unit_id','products.product_sku as sku'
                        )
                        //->where('product_variations.branch_id')
                        ->first();
        if($productVar)
        {

            if(array_key_exists($productVar->productVarId,$productPurchaseCart))
                {
                    //$productPurchaseCart[$order->id]['total_price'] = $productPurchaseCart[$order->id]['quantity'] * $productPurchaseCart[$order->id]['unit_price'];
                    $productPurchaseCart[$productVar->productVarId]['product_var_id'] = $product_var_id;
                    //$productPurchaseCart[$productVar->productVarId]['product_name'] = $productVar->name;
                    $productPurchaseCart[$productVar->productVarId]['purchase_quantity'] = $purchase_quantity;
                    $productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_discount'] = $purchase_unit_price_before_discount;
                    $productPurchaseCart[$productVar->productVarId]['purchase_unit_price_before_tax'] = $purchase_unit_price_before_tax;
                    $productPurchaseCart[$productVar->productVarId]['sub_total_before_tax'] = $sub_total_before_tax;
                    $productPurchaseCart[$productVar->productVarId]['applicable_tax_for_purchase'] = $productVar->applicable_tax_for_purchase;
                    $productPurchaseCart[$productVar->productVarId]['discount_value_in_parcent'] = $discount_value_in_parcent;
                    $productPurchaseCart[$productVar->productVarId]['net_purchase_amount'] = $net_purchase_amount;
                    $productPurchaseCart[$productVar->productVarId]['line_total'] = $line_total;
                    $productPurchaseCart[$productVar->productVarId]['profit_margin_parcent'] = $profit_margin_parcent;
                    $productPurchaseCart[$productVar->productVarId]['unit_selling_price_inc_tax'] = $unit_selling_price_inc_tax;
                }
            session(['productPurchaseCart' => $productPurchaseCart]);
        }
        return view('backend.purchase.ajax.add_to_cart_list');
    }


    /**remove single  purchase cart */
    public function removeSinglePurchaseCart(Request $request)
    {
        $productPurchaseCart = session()->has('productPurchaseCart') ? session()->get('productPurchaseCart')  : [];
		unset($productPurchaseCart[$request->input('productVarId')]);	
        session(['productPurchaseCart'=>$productPurchaseCart]);
        return view('backend.purchase.ajax.add_to_cart_list');
    }

    /**remove all purchase cart */
    public function removeAllPurchaseCart(Request $request)
    {
        session(['productPurchaseCart' => []]);
        return view('backend.purchase.ajax.add_to_cart_list');
    }






    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
