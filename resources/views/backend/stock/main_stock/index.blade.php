 @extends('home')
 @section('title','Main Stock')
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
                        <li class="active">Main Stock</li>
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
                                    <span class="widget-caption" style="font-size: 20px">Main Stock</span>
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
                                                            <select name="stock_id" class="form-control" >
                                                                @foreach ($stockTypies as $item)
                                                                    <option {{$stock_id==$item->id ?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-md btn-primary" value="Search"/>
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
                                                    {{--  {{$stock->used_stock?$stock->used_stock:0.0}}  --}}
                                                    {{ availableStock_HH($stock->productVariations?$stock->productVariations->defaultPurchaseUnits?$stock->productVariations->default_purchase_unit_id:NULL:NULL,$stock->used_stock) }}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Transfer</a>
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
 @endsection
