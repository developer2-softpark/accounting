 @extends('home')
 @section('title','Products')
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
             <li class="active">Products</li>
         </ul>
     </div>
     <!-- /Page Breadcrumb -->
     <!-- Page Header -->
     <div class="page-header position-relative">
         <div class="header-title">
             <h1>
                 Dashboard
             </h1>
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
                         <span class="widget-caption" style="font-size: 20px">Products</span>
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
                         <div class="row" style="margin: 30px 0;">
                             <div class="col-md-6">
                                 <form action="">
                                     <div class="row">
                                         <div class="col-md-8">
                                             <select name="" class="form-control">
                                                 <option value="">Category</option>
                                                 <option value="">Option</option>
                                                 <option value="">Option</option>
                                             </select>
                                         </div>
                                         <div class="col-md-4">
                                             <input type="submit" class="btn btn-info" value="Submit">
                                         </div>
                                     </div>
                                 </form>
                             </div>
                             <div class="col-md-6 text-right">
                                 <a href="{{route('product.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Item</a>
                                 <a href="#" class="btn btn-info">Upload Item</a>
                                 <a href="#" class="btn btn-info">Item Barcode</a>
                             </div>
                         </div>
                         <div class="table-responsive">
                             <table id="example1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                     <tr>
                                         <th>SN</th>
                                         <th>Name</th>
                                         <th>Purchase Price</th>
                                         <th>Sale Price</th>
                                         <th>Added By</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($products as $product)
                                     <tr>
                                         <td>{{$loop->iteration}}</td>
                                         <td>{{$product->name}}</td>
                                         <td>{{$product->purchase_price}}</td>
                                         <td>{{$product->sale_price}}</td>
                                         <td>{{$product->author->name}}</td>
                                         <td>
                                             <a href="#" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                             <a href="{{route('product.edit',$product->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                             <a id="delete" href="{{route('product.destroy',$product->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- /Page Body -->
 </div>
 <!-- /Page Content -->
 @endsection
