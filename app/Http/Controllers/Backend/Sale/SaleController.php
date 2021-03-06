<?php

namespace App\Http\Controllers\Backend\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;


use App\Models\Backend\Sale\Sale_final;
use App\Models\Backend\Sale\Sale_detail;

use App\Models\Backend\Sale\Sale_warranty_guarantee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Backend\Product\ProductVariation;
use App\Model\Backend\Unit\Unit;
use App\Model\Backend\Stock\PrimaryStock;
use App\Model\Backend\Stock\Stock;
use Validator;
class SaleController extends Controller
{

    public function index()
    {
        //
    }


    public function createPos()
    {
        //session(['cartName' => []]);
        //$data['products']   = Product::latest()->get();

        $data['products']   = ProductVariation::whereNull('deleted_at')->latest()->get();

        $data['categories'] = Category::latest()->get();
        $data['customers']  = []; 
        return view('backend.sale_pos.create',$data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }




    /*Store From Add To Cart With Payment Modal, Working Properly*/
    public function storeFromAddToCartWithPayment(Request $request)
    {
        //return $request;
        $input = $request->except('_token');
        $validator = Validator::make($input,[
            //'sale_date' => 'required|min:10:max:10',
            'customer_id' => 'required',
            'final_sub_total_amount' => 'required',
            //'order_no' => 'required|min:2|max:30',
            'product_id.*' => 'nullable|max:100',
            //'description.*' => 'nullable|max:100',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->final_sub_total_amount < 1)
        {
            return redirect()->back()->with('error','Something went wrong!');
        }
        /* 
            $y = substr($request->sale_date,6);;
            $d =  substr($request->sale_date,0,2);
            $m = substr($request->sale_date,3,2);
            $date = $y."-".$m."-".$d;
            $sale_date =  date('Y-m-d',strtotime($date)); 
        */
        $sale_date =  date('Y-m-d h:s:i a');
        // Start transaction!
        DB::beginTransaction();
        try {
                $data = new Sale_final();
                $data->customer_id          = $request->customer_id;
                $data->quantity             = 1;
                $data->sub_total            = $request->final_sub_total_amount;
                $data->discount_type        = $request->final_discount_type;
                $data->discount_value       = $request->final_discount_value;
                $data->discount_amount      = $request->final_discount_amount;
                $data->other_cost           = $request->fianl_other_cost;
                $data->final_total          = $request->fianl_payable_amount;
                $data->paid_total           = $request->paid_amount;
                $data->sale_date            = $sale_date;
                $data->payment_method_id    = $request->payment_method;
                $data->payment_note         = $request->account_note;
                $data->payment_date         = $sale_date;
                $data->payment_received_by  = Auth::user()->id;
                $data->created_by           = Auth::user()->id;
                $save = $data->save();
                $data->order_no = $data->id;
                $finalQuantity = 0;
                if($save)
                {
                    if($request->product_id)
                    {
                        foreach ($request->product_id as $key => $product) 
                        {
                            $sale_detail                    =  new Sale_detail();
                            $sale_detail->sale_final_id     = $data->id;
                            $sale_detail->customer_id       = $request->customer_id;
                            $sale_detail->order_no          = $data->order_no;

                            $sale_detail->product_id        = $product;
                            $sale_detail->quantity          = $request->quantity[$key];
                            $sale_detail->unit_price        = $request->sale_price[$key];
                            $sale_detail->discount_type     = $request->discount_type[$key];
                            $sale_detail->discount_value    = $request->discount_value[$key];
                            $sale_detail->discount_amount   = (($request->quantity[$key] * $request->sale_price[$key])-($request->product_sub_Total_sale_amount[$key]));
                            $sale_detail->sub_total         = ($request->product_sub_Total_sale_amount[$key]);
                            $sale_detail->sale_date         = $sale_date;
                            //$sale_detail->description       = $request->description[$key];
                            $sale_detail->created_by        = Auth::user()->id;
                           

                            $finalQuantity += $request->quantity[$key];

                            $sale_type_id       = $request->sale_type_id[$key];
                            $stock_id           = $request->sale_from_stock_id[$key];
                            $sale_unit_id       = $request->sale_unit_id[$key];

                            $sale_detail->sale_from_stock_id  = $stock_id;
                            $sale_detail->sale_unit_id  = $sale_unit_id;
                            $sale_detail->sale_type_id  = $sale_type_id;

                            $sale_detail->save();


                            subtractionStockQuantity_HH($product,$stock_id,$sale_unit_id,$request->quantity[$key]);


                            if($request->identity_number[$key])
                            {
                                $productFind = Product::find($product);
                                $wG_type = "";
                                if($productFind)
                                {
                                    if($productFind->warranty_period)
                                    {
                                        $wG_type = "warranty"; 
                                    }
                                    else if($productFind->guarantee_period)
                                    {
                                        $wG_type = "guarantee"; 
                                    }else{
                                        $wG_type = ""; 
                                    }
                                }

                                $warranty_guarantee                             =  new Sale_warranty_guarantee();
                                $warranty_guarantee->sale_final_id              = $data->id;
                                $warranty_guarantee->sale_detail_id             = $sale_detail->id;
                                $warranty_guarantee->product_id                 = $product;
                                $warranty_guarantee->sale_date                  = $sale_date;
                                $warranty_guarantee->warranty_guarantee_type    = $wG_type ;
                                $warranty_guarantee->quantity                   = $request->quantity[$key];
                                $warranty_guarantee->identity_number            = $request->identity_number[$key];;
                                $warranty_guarantee->save();
                            }
                        }//foreach end
                    } //if product have end
                }//save if end
                $data->quantity  = $finalQuantity;
                $data->save();
                session(['cartName' => []]);
            }
        catch(\Exception $e)
        {
            DB::rollback();
            if($e->getMessage())
            {
                $message = "Something went wrong! Please Try again";
            }
            return Redirect()->back()
                ->with('error',$message);
        }
            DB::commit();
        return redirect()->back()->with('success','Sale Added Successfully!');
        // session(['cartName' => []]);
    }



    //========================= product quantity subtraction from the product table when creating sale===============
    public function subtractionProductQuantity($product,$quantity)
    {
        $product =  Product::findOrFail($product);
        // $product->quantity               =  ($product->quantity - $quantity);
        $product->save();
    }
    //========================= product quantity subtraction from the product table when creating sale===============


    //========================= product quantity add to the product table when sale delete or update===============
    public function additionProductQuantity($product,$quantity)
    {
        $product =  Product::findOrFail($product);
        //$product->quantity               =  ($product->quantity + $quantity);
        $product->save();
    }
    //========================= product quantity add to the product table when sale delete or update===============

        




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
