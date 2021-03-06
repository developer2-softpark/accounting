 @extends('home')
 @section('title','Account')
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
                        <li class="active">Account</li>
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
                                    <span class="widget-caption" style="font-size: 20px">Account</span>
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
                                        <a href="{{route('admin.account.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Account</a>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Payment Method</th>
                                                <th>Bank Name</th>
                                                <th>Account No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($accounts as $account)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$account->name}}</td>
                                                <td>{{$account->short_name}}</td>
                                                <td>{{$account->account_no}}</td>
                                                <td>
                                                    <a href="{{route('admin.account.edit',$account->id)}}" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a id="delete" href="{{route('admin.account.destroy',$account->id)}}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Payment Method</th>
                                                <th>Bank Name</th>
                                                <th>Account No</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
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
