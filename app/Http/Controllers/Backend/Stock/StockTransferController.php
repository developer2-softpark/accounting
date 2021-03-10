<?php

namespace App\Http\Controllers\Backend\Stock;

use App\Http\Controllers\Controller;
use App\Model\Backend\Stock\PrimaryStock;
use App\Model\Backend\Stock\SecondaryStock;
use App\Model\Backend\Stock\Stock;
use App\Model\Backend\Stock\StockTransferHistory;
use App\Model\Backend\Stock\StockType;
use Illuminate\Http\Request;

class StockTransferController extends Controller
{
    public function transfer(Request $request)
    {

        if ($request->to_stock_type_id == 3) {
            $existing_data = PrimaryStock::where("id", $request->primary_stock_id)->first();

            if (getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->transfer_quantity) > $existing_data->available_stock) {
                return redirect()->back()->with(array(
                    'message' => 'Transefer Quantity is more than Available Quantity!',
                    'alert-type' => 'error'
                ));
            }
            if (SecondaryStock::where(["product_id" => $existing_data->product_id, "stock_id" => $request->to_stock_id, "stock_type_id" => $request->to_stock_type_id])->where("id", "!=", $existing_data->id)->exists()) {
                $newStock = SecondaryStock::where(["product_id" => $existing_data->product_id, "stock_id" => $request->to_stock_id, "stock_type_id" => $request->to_stock_type_id])->where("id", "!=", $existing_data->id)->first();
            } else {
                $newStock = new SecondaryStock();
            }
        } else {
            $existing_data = SecondaryStock::where("id", $request->primary_stock_id)->first();

            if (getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->transfer_quantity) > $existing_data->available_stock) {
                return redirect()->back()->with(array(
                    'message' => 'Transefer Quantity is more than Available Quantity!',
                    'alert-type' => 'error'
                ));
            }

            if (PrimaryStock::where(["product_id" => $existing_data->product_id, "stock_id" => $request->to_stock_id, "stock_type_id" => $request->to_stock_type_id])->where("id", "!=", $existing_data->id)->exists()) {
                $newStock = PrimaryStock::where(["product_id" => $existing_data->product_id, "stock_id" => $request->to_stock_id, "stock_type_id" => $request->to_stock_type_id])->where("id", "!=", $existing_data->id)->first();
            } else {
                $newStock = new PrimaryStock();
            }
        }

        $newStock->business_location_id = 1;
        $newStock->business_type_id = 1;
        $newStock->stock_type_id = $request->to_stock_type_id;
        $newStock->stock_id = $request->to_stock_id;
        $newStock->product_id = $existing_data->product_id;
        $newStock->product_variation_id = $existing_data->product_variation_id;
        $newStock->available_stock += getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->receive_quantity);
        $newStock->stock_lock_applicable = 1;
        $newStock->save();

        $existing_data->available_stock -= getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->receive_quantity);
        $existing_data->save();


        $stockTransferHistory = new StockTransferHistory();
        $stockTransferHistory->business_location_id = 1;
        $stockTransferHistory->business_type_id = 1;
        $stockTransferHistory->from_stock_type_id = $existing_data->stock_type_id;
        $stockTransferHistory->from_stock_id = $existing_data->stock_id;
        $stockTransferHistory->from_product_id = $existing_data->product_id;
        $stockTransferHistory->from_product_variation_id = $existing_data->product_variation_id;
        $stockTransferHistory->transfer_quantity = getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->receive_quantity);

        $stockTransferHistory->to_stock_type_id = $newStock->stock_type_id;
        $stockTransferHistory->to_stock_id = $newStock->stock_id;
        $stockTransferHistory->to_product_id = $newStock->product_id;
        $stockTransferHistory->to_product_variation_id = $newStock->product_variation_id;
        $stockTransferHistory->receive_quantity = getTotalQuantityByUnitId_HH($existing_data->products->purchaseUnit->id, $request->receive_quantity);
        $stockTransferHistory->created_by = auth()->user()->id;

        if ($stockTransferHistory->save()) {
            $notification = array(
                'message' => 'Successfully Product Transfer!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Someting Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    public function getStock(PrimaryStock $primaryStock)
    {
        $primaryStock->stock = $primaryStock->stocks;
        $primaryStock->stock_type = $primaryStock->stockType;
        $primaryStock->product = $primaryStock->products;
        $primaryStock->available_stock = availableStock_HH($primaryStock->productVariations ? $primaryStock->products->purchaseUnit->id  : NULL, $primaryStock->available_stock);
        $productVariation = (!empty($primaryStock->productVariations->sizes) ? "{" . $primaryStock->productVariations->sizes->name . "}" : "");
        $productVariation .= (!empty($primaryStock->productVariations->colors) ? "{" . $primaryStock->productVariations->colors->name . "}" : "");
        $productVariation .= (!empty($primaryStock->productVariations->weights) ? "{" . $primaryStock->productVariations->weights->name . "}" : "");
        $primaryStock->productVariation = $productVariation;
        $primaryStock->unit = $primaryStock->products->purchaseUnit->full_name;
        $data["primaryStock"] = $primaryStock;
        $data["stockTypes"] = StockType::whereIn("id", [2, 3])->get();
        return $data;
    }
    public function getStockSecondary(SecondaryStock $secondaryStock)
    {
        // dd($secondaryStock);
        $primaryStock = $secondaryStock;
        $primaryStock->stock = $primaryStock->stocks;
        $primaryStock->stock_type = $primaryStock->stockType;
        $primaryStock->product = $primaryStock->products;
        $primaryStock->available_stock = availableStock_HH($primaryStock->productVariations ? $primaryStock->products->purchaseUnit->id  : NULL, $primaryStock->available_stock);
        $productVariation = (!empty($primaryStock->productVariations->sizes) ? "{" . $primaryStock->productVariations->sizes->name . "}" : "");
        $productVariation .= (!empty($primaryStock->productVariations->colors) ? "{" . $primaryStock->productVariations->colors->name . "}" : "");
        $productVariation .= (!empty($primaryStock->productVariations->weights) ? "{" . $primaryStock->productVariations->weights->name . "}" : "");
        $primaryStock->productVariation = $productVariation;
        $primaryStock->unit = $primaryStock->products->purchaseUnit->full_name;
        $data["primaryStock"] = $primaryStock;
        $data["stockTypes"] = StockType::whereIn("id", [2, 3])->get();
        return $data;
    }

    public function getStocks(StockType $stock_type)
    {
        return Stock::where("stock_type_id", $stock_type->id)->get();
    }
}
