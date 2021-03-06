<?php

namespace App\Http\Controllers\Backend\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Stock\MainStock;
use App\Model\Backend\Stock\Stock;
class MainStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['stockTypies'] = Stock::whereNull('deleted_at')->where('stock_type_id',1)->get();
        if($request->stock_id)
        {
            $stock_id = $request->stock_id;
        }else{
            $stock_id = 1;
        }
        $data['stock_id'] = $stock_id;
       $data['stocks'] =  MainStock::whereNull('deleted_at')
                            ->where('stock_id',$stock_id)
                            ->latest()
                            ->where('stock_type_id',1)
                            ->get();
                    //->where('company_id',1)
                    //->where('stock_type_id',1)
                    //->where('stock_type_id',1)
        return view('backend.stock.main_stock.index',$data);
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
