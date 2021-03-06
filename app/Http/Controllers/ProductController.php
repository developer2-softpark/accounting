<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\User;
use Auth;
use App\Model\Backend\Supplier;
use App\Model\Backend\Product\ProductVariation;
class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::where('status',1)->get();
        return view('backend.products.view',$data);
    }
    
    public function create()
    {
        //$data['suppliers'] = User::where('role',3)->get();
        $data['suppliers'] = Supplier::get();
        $data['customers'] = User::where('role',4)->get();
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
    
        return view('backend.products.add',$data);
    }

    
    public function store(Request $request)
    {           
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $data = new Product;
        
            $checkproductidcount = Product::orderBy('id','DESC')->count();
            $checkproductid = Product::orderBy('id','DESC')->first();
        
            if($checkproductidcount>0)
            {
                $data->product_uid = $checkproductid->productuid+1;
            }
            else{
                $data->product_uid  = '2000001';
            }
        
        $data->company_uid           = companyId_HH();
        $data->user_id               = Auth::user()->id;
        
        $data->supplier_id           = $request->supplier_id;
        $data->name                  = $request->name;
        $data->purchase_price        = $request->purchase_price;
        $data->sale_price            = $request->sale_price;
        $data->whole_sale_price      = $request->whole_sale_price;
        $data->mrp_price             = $request->mrp_price;
        
        $data->online_sell_price     = $request->online_sell_price;
        $data->online_discount_price  = 00;
        $data->category_id           = $request->category_id;
        $data->brand_id              = $request->brand_id;
        $data->purchase_unit_id         = $request->purchase_unit;
        $data->sale_unit_id             = $request->purchase_unit;
        $data->low_sell_qty          = $request->low_sale_qty;
        $data->low_alert_qty         = $request->low_alert_qty;
        
        $data->warranty_period_type     = $request->warrantity_period_type;
        $data->warranty_period          = $request->warranty_period;
        $data->warranty_value           =  daysMonthsYearsConverters_HH($request->warrantity_period_type,$request->warranty_period);    

        $data->guarantee_period_type    = $request->guarantee_period_type;
        $data->guarantee_period         = $request->guarantee_period;
        $data->guarantee_value          =  daysMonthsYearsConverters_HH($request->guarantee_period_type,$request->guarantee_period);    

        $data->expiry_period_type       = $request->expiry_period_type;
        $data->expiry_period            = $request->expiry_period;

        $data->expiry_value             =  daysMonthsYearsConverters_HH($request->expiry_period_type,$request->expiry_period);    

        $data->sale_discount_type       = $request->discount_type;
        $data->sale_discount_value      = $request->discount_value;
        $data->sale_discount_amount     = discountCalculate_HH($request->discount_type,$request->sale_price, $request->discount_value); //$types="fixed",$calculate_with = 0, $calculate_by = 0


        $data->initial_stock            = $request->initial_stock;
        $data->description              = $request->description;
        
        $image = $request->file('default_photo');
        if($image){
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'public/uploaded/products/';
            $imagename = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $data['default_photo'] = $imagename;
            
        }
        
        
        
       /* not understanding*/
        
        $data->product_sku           = 1;
        $data->bussiness_type_id     = businessTypeId_HH();
        $data->brunch_id             = 1;
        $data->is_return             = 1;
        $data->tax_type              = 1;
        $data->tax                   = 1;
        $data->barcode_type          = 1;
        $data->status          = 1;
        
        /* not understanding*/ 
        
        $data->save();
        
        /** product Variation table */
        $this->insertProductVariationData($data);


        $notification = array(
            'message' => 'Product updated successfully !!',
            'alert-type' => 'success',
        );
        
        return redirect()->back()->with($notification);
    }



    public function insertProductVariationData($data)
    {
        $proVari = new ProductVariation();
        $proVari->business_type_id = 1;
        $proVari->product_id = $data->id;
        $proVari->supplier_id = $data->supplier_id;
        $proVari->default_purchase_price = $data->purchase_price;
        $proVari->whole_sale_price = $data->whole_sale_price;
        $proVari->unit_selling_price_inc_tax = $data->sale_price;
        $proVari->unit_selling_price_exc_tax = $data->sale_price;
        $proVari->default_selling_price = $data->sale_price;

        $proVari->default_purchase_unit_id = $data->purchase_unit_id;
        $proVari->default_sale_unit_id = $data->purchase_unit_id;
  
        $proVari->mrp_price = $data->mrp_price;

        $proVari->alert_quantity = $data->low_alert_qty;

        $proVari->save();
        return $proVari;
    }

   
    public function show(Brand $brand)
    {
        //
    }

    
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        //$data['suppliers'] = User::where('role',3)->get();
        $data['suppliers'] = Supplier::get();
        $data['customers'] = User::where('role',4)->get();
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        return view('backend.products.edit',$data);
    }

    
    public function update(Request $request,$id)
    {
         $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $data = Product::find($id);
        
            $checkproductidcount = Product::orderBy('id','DESC')->count();
            $checkproductid = Product::orderBy('id','DESC')->first();
        
            if($checkproductidcount>0)
            {
                $data->product_uid = $checkproductid->productuid+1;
            }
            else{
                $data->product_uid  = '2000001';
            }
        
        //===================================================================
        $data->company_uid           = companyId_HH();
        $data->user_id               = Auth::user()->id;
        
        $data->supplier_id           = $request->supplier_id;
        $data->name                  = $request->name;
        $data->purchase_price        = $request->purchase_price;
        $data->sale_price            = $request->sale_price;
        $data->whole_sale_price      = $request->whole_sale_price;
        $data->mrp_price             = $request->mrp_price;
        
        $data->online_sell_price     = $request->online_sell_price;
        $data->online_discount_price  = 00;
        $data->category_id           = $request->category_id;
        $data->brand_id              = $request->brand_id;
        $data->purchase_unit_id         = $request->purchase_unit;
        $data->sale_unit_id             = $request->purchase_unit;
        $data->low_sell_qty          = $request->low_sale_qty;
        $data->low_alert_qty         = $request->low_alert_qty;
        
        $data->warranty_period_type     = $request->warrantity_period_type;
        $data->warranty_period          = $request->warranty_period;
        $data->warranty_value           =  daysMonthsYearsConverters_HH($request->warrantity_period_type,$request->warranty_period);    

        $data->guarantee_period_type    = $request->guarantee_period_type;
        $data->guarantee_period         = $request->guarantee_period;
        $data->guarantee_value          =  daysMonthsYearsConverters_HH($request->guarantee_period_type,$request->guarantee_period);    

        $data->expiry_period_type       = $request->expiry_period_type;
        $data->expiry_period            = $request->expiry_period;

        $data->expiry_value             =  daysMonthsYearsConverters_HH($request->expiry_period_type,$request->expiry_period);    

        $data->sale_discount_type       = $request->discount_type;
        $data->sale_discount_value      = $request->discount_value;
        $data->sale_discount_amount     = discountCalculate_HH($request->discount_type,$request->sale_price, $request->discount_value); //$types="fixed",$calculate_with = 0, $calculate_by = 0


        $data->initial_stock            = $request->initial_stock;
        $data->description              = $request->description;  
        
        $image = $request->file('default_photo');
        if($image){
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'public/uploaded/products/';
            $imagename = $filepath.$uniqname.'.'.$ext;
            @unlink($data->default_photo);
            $image->move($filepath,$imagename);
            $data['default_photo'] = $imagename;
            
        }

        /* not understanding*/
        $data->product_sku           = 1;
        $data->bussiness_type_id     = businessTypeId_HH();
        $data->brunch_id             = 1;
        $data->is_return             = 1;
        $data->tax_type              = 1;
        $data->tax                   = 1;
        $data->barcode_type          = 1;
        $data->status          = 1;
        
        /* not understanding*/ 
        
        $data->save();

        
        $this->insertProductVariationData($data);


        $notification = array(
            'message' => 'Product updated successfully !!',
            'alert-type' => 'success',
        );
        
        return redirect()->back()->with($notification);


        //===================================================================    
            /* $data->company_uid           = Auth::user()->id;
            $data->user_id               = Auth::user()->id;
            
            $data->supplier_id           = $request->supplier_id;
            $data->name                  = $request->name;
            $data->purchase_price        = $request->purchase_price;
            $data->whole_sale_price      = $request->sale_price;
            $data->retail_price          = $request->retail_price;
            $data->mrp_price             = $request->mrp_price;
            
            $data->online_sell_price     = $request->online_sell_price;
            $data->online_discount_price  = $request->online_discount_price;
            $data->category_id           = $request->category_id;
            $data->brand_id              = $request->brand_id;
            $data->purchase_unit         = $request->purchase_unit;
            $data->sale_unit             = $request->sale_unit;
            $data->low_sale_qty          = $request->low_sale_qty;
            $data->low_alert_qty         = $request->low_alert_qty;
            
            $data->warranty              = $request->warranty;
            $data->guarantee             = $request->guarantee;
            $data->description           = $request->description;
            
            $image = $request->file('default_photo');
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/uploaded/products/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                @unlink($data->default_photo);
                $image->move($filepath,$imagename);
                $data['default_photo'] = $imagename;
                
            }
        
        
        
            //not understanding
            $data->product_sku           = 1;
            $data->bussiness_type_id     = 1;
            $data->brunch_id             = 1;
            $data->is_return             = 1;
            $data->tax_type              = 1;
            $data->tax                   = 1;
            $data->barcode_type          = 1;
            //not understanding 
            
            $data->save();
            
            $notification = array(
                'message' => 'Product updated successfully !!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification); */
        //=================================================================== 
    }

    public function destroy(Brand $brand)
    {
         Brand::find($id)->delete();

         $notification = array(
                    'message' => 'Successfully Brand deleted!',
                    'alert-type' => 'success'
            );

        return redirect()->route('brand.index')->with($notification);

    }
}
