 @extends('home')
 @section('title','Home')
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
             <li class="active">Dashboard</li>
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
             <div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
                 <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="boxitem bg-white" style="margin-bottom:20px">
                             <div class="singlebox ">
                                 <div class="itembox">
                                     <h1>5000 <span class="pull-right"><i class="fa fa-th-list"></i></span></h1>
                                     <p>Total Items</p>
                                     <a href="" class="btn btn-default" style="width:100%">More Detials <i class="fa fa-arrow-circle-right"></i></a>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="boxitem bg-white" style="margin-bottom:20px">
                             <div class="singlebox ">
                                 <div class="itembox">
                                     <h1>5000 <span class="pull-right"><i class="fa fa-users"></i></span></h1>
                                     <p>Total Users</p>
                                     <a href="" class="btn btn-default" style="width:100%">More Detials <i class="fa fa-arrow-circle-right"></i></a>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="boxitem bg-white" style="margin-bottom:20px">
                             <div class="singlebox ">
                                 <div class="itembox">
                                     <h1>5000 <span class="pull-right"><i class="fa fa-users"></i></span></h1>
                                     <p>Total Supplier</p>
                                     <a href="" class="btn btn-default" style="width:100%">More Detials <i class="fa fa-arrow-circle-right"></i></a>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="boxitem bg-white" style="margin-bottom:20px">
                             <div class="singlebox ">
                                 <div class="itembox">
                                     <h1>5000 <span class="pull-right"><i class="fa fa-users"></i></span></h1>
                                     <p>Total Customers</p>
                                     <a href="" class="btn btn-default" style="width:100%">More Detials <i class="fa fa-arrow-circle-right"></i></a>
                                 </div>

                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-link"></i> Quick Links</div>
                     <div class="buttons-preview">
                         <a class="btn btn-default shiny blue" href="javascript:void(0);"> <i class="fa fa-plus"></i> Add Item</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-list"></i>Daily Summery Reports</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-envelope"></i>Send SMS</a>
                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-user"></i> + Supplier Payments</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-list"></i> Register Reports</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-cube "></i>Stock</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-desktop "></i>POS</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-tasks "></i>Profit Loss Reports</a>


                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-users "> +</i>Customer Receive</a>


                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-money text-info "> </i>Expense</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-tasks text-info "> </i>Sales Reports</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-clock-o text-info "> </i> +Attendance</a>


                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-tasks text-info "> </i> + Purchase</a>

                         <a class="btn btn-default shiny blue" href="javascript:void(0);"><i class="fa fa-tasks text-info "> </i> Sales Report</a>




                     </div>

                 </div>

             </div>
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-shopping-cart"></i> Item/Service (This Month)</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>



                     </div>

                 </div>

             </div>

         </div>
         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-truck"></i> Operational Comparision(This Month)</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>




                     </div>

                 </div>

             </div>
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-shopping-cart"></i> Item Low/Low Stock (23)</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>



                     </div>

                 </div>

             </div>
         </div>
         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-truck"></i> Top 10 Items This Month</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>




                     </div>

                 </div>

             </div>
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-users"></i> Top 10 Customers This Month</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>



                     </div>

                 </div>

             </div>
         </div>
         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-money"></i> Customer Receivables</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>




                     </div>

                 </div>

             </div>
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-money"></i> Supplier Payables</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>



                     </div>

                 </div>

             </div>
         </div>

         <div class="row">
             <div class="col-lg-6 col-sm-6 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-money"></i> Account</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>




                     </div>

                 </div>

             </div>

         </div>

         <div class="row">
             <div class="col-lg-12 col-sm-12 col-xs-12">
                 <div class="well with-header with-footer">
                     <div class="header bordered-blue"><i class="fa fa-shopping-cart"></i> Monthly Sale Comparison</div>
                     <div class="buttons-preview">
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                         <br>
                     </div>
                 </div>

             </div>
         </div>

     </div>
     <!-- /Page Body -->
 </div>
 <!-- /Page Content -->
 @endsection
