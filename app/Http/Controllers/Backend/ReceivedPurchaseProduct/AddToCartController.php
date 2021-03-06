<?php

namespace App\Http\Controllers\Backend\ReceivedPurchaseProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Supplier;
use App\Model\Backend\Purchase\PurchaseFinal;
use App\Model\Backend\Purchase\PurchaseDetail;
use App\Model\Backend\PurchaseProductReceiveHistory\PurchaseProductReceiveHistory;
class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseProductReceiveCartIfExist(Request $request)
    {
        return view('backend.receive_purchase_product.ajax.create_list');
    }

    public function searchAndAddToCart(Request $request)
    {
        $chalan_no      = $request->chalan_no;
        $reference_no   = $request->reference_no;
        $invoice_no     = $request->invoice_no;
        $supplier_id    = $request->supplier_id;
        $query = PurchaseDetail::query();
        $query->where('purchase_status_id',2)
        ->where('supplier_id',$supplier_id);
        $query->when($chalan_no,function($q) use  ($chalan_no)
        {
            return $q->where('chalan_no',$chalan_no);
        });
        $query->when($reference_no,function($q) use  ($reference_no)
        {
            return $q->where('reference_no',$reference_no);
        });
        $query->when($invoice_no,function($q) use  ($invoice_no)
        {
            return $q->where('invoice_no',$invoice_no);
        });
        /*  $query->when($supplier_id,function($q) use  ($supplier_id)
        {
            return $q->where('supplier_id',$supplier_id);
        }); */
        $data = $query->get();
        foreach ($data as $key => $value)
        {
            $this->addToSessionForCart($value);
        }
        return view('backend.receive_purchase_product.ajax.create_list');
    }


    /**from pulling product by ajax */
    public function addToSessionForCart($purchase)
    {
        $receiveProductPurchaseCart = [];
        $receiveProductPurchaseCart = session()->has('receiveProductPurchaseCart') ? session()->get('receiveProductPurchaseCart')  : [];
        //$product =  //Order::where('orderuid',$orderuid)->first();
        if($purchase)
        {
                $sizeName = NULL;$weightName = NULL;$colorName = NULL; $name =NULL;
                if($purchase->productVariations->sizes) $sizeName = " - ".$purchase->productVariations->sizes->name;
                if($purchase->productVariations->colors) $colorName = " - ".$purchase->productVariations->colors->name;
                if($purchase->productVariations->weights) $weightName = " - ".$purchase->productVariations->weights->name;
                if($purchase->productVariations->products) $name = $purchase->productVariations->products->name;
                $productName = $name . $sizeName . $colorName . $weightName;
            if(array_key_exists($purchase->id,$receiveProductPurchaseCart))
                {
                    //$receiveProductPurchaseCart[$order->id]['total_price'] = $receiveProductPurchaseCart[$order->id]['quantity'] * $receiveProductPurchaseCart[$order->id]['unit_price'];
                }
            else{
                $receiveProductPurchaseCart[$purchase->id] = [
                    'purchase_id' => $purchase->purchase_final_id,
                    'purchase_detail_id' => $purchase->id,
                    'product_var_id' => $purchase->product_variation_id,
                    'product_name' => $productName ,
                    'product_id' => $purchase->product_id,
                    'default_purchase_unit_id' => $purchase->default_purchase_unit_id,
                    'default_purchase_unit' => $purchase->defaultPurchaseUnits?$purchase->defaultPurchaseUnits->short_name:NULL,
                    'purchase_quantity' =>$purchase->quanity,
                    'total_received_qty' => number_format($purchase->totalReceivedQtys(),2),
                    'receiving_qty' => 0,
                    'total_due_qty' => number_format((($purchase->quanity) - ($purchase->totalReceivedQtys())),2),
                ];
            }
            session(['receiveProductPurchaseCart' => $receiveProductPurchaseCart]);
        }
        return true;
    }
    /**from pulling product by ajax */


    public function updatePurchaseReceiveAddToCart(Request $request)
    {
        $purchaseDetailsId = $request->purchaseDetailId;
        $receivingQty = $request->receivingQty;
        $totalOrderQuantity = $request->totalOrderQuantity;
        $totalOrderReceivedQuantity = $request->totalOrderReceivedQuantity;
        $totalDueQty = $request->totalDueQty;

        $receiveProductPurchaseCart = [];
        $receiveProductPurchaseCart = session()->has('receiveProductPurchaseCart') ? session()->get('receiveProductPurchaseCart')  : [];
        //$product =  //Order::where('orderuid',$orderuid)->first();
        if($purchaseDetailsId)
        {
            if(array_key_exists($purchaseDetailsId,$receiveProductPurchaseCart))
            {
                $receiveProductPurchaseCart[$purchaseDetailsId]['receiving_qty'] = number_format($receivingQty,2);
                $receiveProductPurchaseCart[$purchaseDetailsId]['total_due_qty'] = number_format($totalDueQty,2);
            }
            session(['receiveProductPurchaseCart' => $receiveProductPurchaseCart]);
        }
        return view('backend.receive_purchase_product.ajax.create_list');
    }
    

    /**update cart by not needed */
    public function updateSessionForCart($purchaseDetailsId)
    {
        $receiveProductPurchaseCart = [];
        $receiveProductPurchaseCart = session()->has('receiveProductPurchaseCart') ? session()->get('receiveProductPurchaseCart')  : [];
        //$product =  //Order::where('orderuid',$orderuid)->first();
        if($purchaseDetailsId)
        {
            if(array_key_exists($purchaseDetailsId,$receiveProductPurchaseCart))
            {
                /* $receiveProductPurchaseCart[$purchaseDetailsId]['purchase_quantity'] = '';
                $receiveProductPurchaseCart[$purchaseDetailsId]['total_received_qty'] = '';
                $receiveProductPurchaseCart[$purchaseDetailsId]['receiving_qty'] = '';
                $receiveProductPurchaseCart[$purchaseDetailsId]['total_due_qty'] = ''; */
            }
            session(['receiveProductPurchaseCart' => $receiveProductPurchaseCart]);
        }
        return true;
    }
    /**update cart by not needed */



    /**remove single  purchase cart */
    public function removeSinglepurchaseProductReceiveCart(Request $request)
    {
        $receiveProductPurchaseCart = session()->has('receiveProductPurchaseCart') ? session()->get('receiveProductPurchaseCart')  : [];
        unset($receiveProductPurchaseCart[$request->input('purchaseDetailId')]);
        session(['receiveProductPurchaseCart'=>$receiveProductPurchaseCart]);
        return view('backend.receive_purchase_product.ajax.create_list');
    }
    /**remove all purchase cart */
    public function removeAllpurchaseProductReceiveCart(Request $request)
    {
        session(['receiveProductPurchaseCart' => []]);
        return view('backend.receive_purchase_product.ajax.create_list');
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
