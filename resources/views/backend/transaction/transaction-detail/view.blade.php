@extends('home')
@section('title','Transaction Details')
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
            <li class="active">Transaction Details</li>
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
            <a class="sidebar-toggler" href="javascript:void(0)">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="javascript:void(0)" onclick="location.reload()">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="javascript:void(0)">
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
                        <span class="widget-caption" style="font-size: 20px">Transaction Details</span>
                        <div class="widget-buttons">
                            <a href="javascript:void(0)" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="javascript:void(0)" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="javascript:void(0)" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body" style="background-color: #fff;">
                        <div class="table-toolbar text-right">
                            <a href="{{route('admin.transaction-detail.create')}}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add Transaction Details
                            </a>
                        </div>
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Reference</th>
                                    <th>Transaction Date</th>
                                    <th>Other Cost</th>
                                    <th>Title</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactionFinals as $transactionFinal)
                                @foreach ($transactionFinal->transactionDetails as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$transactionFinal->transactionType->name}}</td>
                                    <td>{{$transactionFinal->transactionCategory->name}}</td>
                                    <td>{{$transactionFinal->reference_no}}</td>
                                    <td>{{$transactionFinal->transaction_date}}</td>
                                    <td>{{$transactionFinal->others_cost}}</td>
                                    <td>{{$item->transaction_title}}</td>
                                    <td>{{$item->sub_total}}</td>
                                    <td>
                                        <a href="{{route('admin.transaction-detail.edit',$item->id)}}"
                                            class="btn btn-info btn-xs edit">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form id="delete-form"
                                            action="{{route('admin.transaction-detail.destroy',$item->id)}}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit">
                                                <i class="fa fa-trash-o"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                            <tfooter>
                                <tr>
                                    <th>SN</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Reference</th>
                                    <th>Transaction Date</th>
                                    <th>Other Cost</th>
                                    <th>Title</th>
                                    <th>Sub Total</th>
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

@push('js')
<script>
    function addRow(){
        $("#tbody-transaction").append(`
            <tr>
                <td>
                    <div class="form-group">
                        <input name="reference_no[]" type="text" placeholder="" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input name="transaction_title[]" type="text" placeholder="" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input name="description[]" type="text" placeholder="" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input name="sub_total[]" type="text"  placeholder="" class="form-control">
                    </div>
                </td>
                <td>
                    <button class="btn btn-success add-row" type="button" onclick="addRow()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger delete-row" type="button" onclick="deleteRow(this)">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        `);
    }
    function deleteRow(e){
        e.parentNode.parentNode.remove();
    }
</script>
@endpush