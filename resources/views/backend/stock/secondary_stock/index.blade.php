@extends('home')
@section('title','Secondary Stock')
@section('content')
<!-- Page Content -->
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Secondary Stock</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">

        </div>
        <!--Header Buttons-->
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="default.htm">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
        <!--Header Buttons End-->
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header bg-info">
                        <span class="widget-caption" style="font-size: 20px">Secondary Stock</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body" style="background-color: #fff;">
                        <div class="table-toolbar text-right">
                            <div class="row">
                                <form>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="stock_id" class="form-control">
                                                    @foreach ($stockTypies as $item)
                                                    <option {{$stock_id == $item->id ? 'selected' :''}}
                                                        value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-md btn-primary" value="Search" />
                                            </div>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Product Name</th>
                                    <th>Purchase Unit</th>
                                    <th>Abailable Stock</th>
                                    <th>Used Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$stock->productVariations?$stock->productVariations->products?$stock->productVariations->products->name:NULL:NULL}}
                                        {{$stock->productVariations?$stock->productVariations->sizes?" (".$stock->productVariations->sizes->name .") ":NULL:NULL}}
                                        {{$stock->productVariations?$stock->productVariations->colors?" (".$stock->productVariations->colors->name .") ":NULL:NULL}}
                                        {{$stock->productVariations?$stock->productVariations->weights?" (".$stock->productVariations->weights->name .") ":NULL:NULL}}
                                    </td>
                                    <td>
                                        {{$stock->productVariations?$stock->productVariations->defaultPurchaseUnits?$stock->productVariations->defaultPurchaseUnits->short_name:NULL:NULL}}
                                    </td>

                                    <td>
                                        {{--
                                                        {{$stock->productVariations?$stock->productVariations->defaultPurchaseUnits?$stock->productVariations->defaultPurchaseUnits->calculation_result:NULL:NULL}}
                                        {{$stock->available_stock}}
                                        --}}
                                        {{ availableStock_HH($stock->productVariations?$stock->productVariations->defaultPurchaseUnits?$stock->productVariations->default_purchase_unit_id:NULL:NULL,$stock->available_stock) }}
                                    </td>
                                    <td>
                                        {{--  {{$stock->used_stock?$stock->used_stock:0.0}} --}}
                                        {{ availableStock_HH($stock->productVariations?$stock->productVariations->defaultPurchaseUnits?$stock->productVariations->default_purchase_unit_id:NULL:NULL,$stock->used_stock) }}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="transferForm({{$stock->id}})"
                                            class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>
                                            Transfer</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfooter>
                                <tr>
                                    <th>SN</th>
                                    <th>Product Name</th>
                                    <th>Purchase Unit</th>
                                    <th>Abailable Stock</th>
                                    <th>Used Stock</th>
                                    <th>Action</th>
                                </tr>
                            </tfooter>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>
<!-- /Page Content -->
<!-- /Page Content -->
<div class="modal fade" id="transfer-show" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus-circle"></i> Transfer Product
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div>
            <div class="modal-body" id="show-modal-body">
                <form action="{{route('admin.transfer-stock')}}" method="POST" id="form">
                    @csrf


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
        

    function loadStocks(){
        $.ajax({
            url: '{{url("admin/transfer-stock/stocks")}}/' + $("#to_stock_type_id").val(),
            type: 'GET',
            success: function(response){
                $("#to_stock_id").empty();
                $("#to_stock_id").append(
                    `<option selected>Choose Stock</option>`
                );
                response.forEach(item => {
                    $("#to_stock_id").append(
                        `<option value="${item.id}">${item.name}</option>`
                    );
                });
            },
        });
    }

    function transferForm(id){
        $("#transfer-show").modal("show");
        $.ajax({
            url: '{{url("admin/transfer-stock-secondary")}}/' + id,
            type: 'GET',
            success: function(response){
                $("#form").empty();
                $("#form").append(
                    `
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="${response.primaryStock.product.name}${response.primaryStock.productVariation}" readonly>
                                <input type="hidden" name="primary_stock_id" value="${response.primaryStock.id}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h5>From</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5>To</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="from_stock_type_id">Stock</label>
                                <select name="from_stock_type_id" class="form-control" id="from_stock_type_id" disabled>
                                    <option value="${response.primaryStock.stock.id}" selected>${response.primaryStock.stock.name}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="to_stock_type_id">Stock</label>
                                <select name="to_stock_type_id" class="form-control" id="to_stock_type_id" onchange="loadStocks();">
                                    <option selected>Choose Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="from_stock_id">Stock Type</label>
                                <select name="from_stock_id" class="form-control" id="from_stock_id" disabled>
                                    <option value="${response.primaryStock.stock_type.id}" selected>${response.primaryStock.stock_type.name}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="to_stock_id">Stock Type</label>
                                <select name="to_stock_id" class="form-control" id="to_stock_id">
                                    <option selected>Choose Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="transfer_quantity">Stock Quantity</label>
                                <input type="text" class="form-control" value="${response.primaryStock.available_stock} ${response.primaryStock.unit}" id="transfer_quantity" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="receive_quantity">Transfer Quantity</label>
                                <input type="number" min="0" step="0.01" class="form-control" name="receive_quantity" id="receive_quantity" oninput="receiveQuantity();">
                                <span id="text_receive_quantity" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    `
                );
                response.stockTypes.forEach(item => {
                    $("#to_stock_type_id").append(
                        `<option value="${item.id}" >${item.name}</option>`
                    );
                });
            },
        });
    }

    function receiveQuantity(){
        if(parseFloat($("#receive_quantity").val()) > parseFloat($("#transfer_quantity").val().replace(/[^0-9\.]/g, ''))){
            $("#text_receive_quantity").text("Insert less than or equal available quantity");
        }else{
            $("#text_receive_quantity").text("");
        }
    }

</script>
@endpush