<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Inventory</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('public/frontend') }}/img/favicon.png" type="image/x-icon">


    <!--Basic Styles-->
    <link href="{{ asset('public/frontend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link
        href="../fonts.googleapis.com/css@family=open+sans_3a300italic,400italic,600italic,700italic,400,600,700,300.css"
        rel="stylesheet" type="text/css">
    <link href='../fonts.googleapis.com/css@family=roboto_3a400,300.css' rel='stylesheet' type='text/css'>
    <!--Beyond styles-->
    <link href="{{ asset('public/frontend') }}/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/frontend') }}/css/demo.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/typicons.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/animate.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('public/frontend') }}/css/custom.css">

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="{{ asset('public/frontend') }}/js/skins.min.js"></script>



    <!--extra added-->

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/table/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/frontend') }}/table/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!--toastr.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />


    <style>
        .page-breadcrumbs .breadcrumb {
            line-height: 35px;
        }
    </style>
    @stack('css')
</head>
<!-- /Head -->
<!-- Body -->

<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand" style="line-height: normal;">
                        Admin Dashboard
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="{{ asset('public/frontend') }}/img/avatars/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>{{ Auth::user()->name }}</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">

                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="{{ asset('public/frontend') }}/img/avatars/adam-jansen.jpg"
                                                class="avatar">
                                            <span class="caption">Change Photo</span>
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Profile</a>
                                        <a href="#" class="pull-right">Setting</a>
                                    </li>


                                    <li class="dropdown-footer">
                                        <a href="login.html">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>

                        </ul>

                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Home-->
                    <li>
                        <a href="{{route('home')}}">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Home </span>
                        </a>
                    </li>

                    <!--Product-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-database"></i>
                            <span class="menu-text"> Products/Items & Others </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="{{route('unit.index')}}">
                                    <span class="menu-text">Units</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('category.index')}}">
                                    <span class="menu-text">Item Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('brand.index')}}">
                                    <span class="menu-text">Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('product.index')}}">
                                    <span class="menu-text">Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="buttons.html">
                                    <span class="menu-text">Suppliers</span>
                                </a>
                            </li>
                            <li>
                                <a href="nestable-list.html">
                                    <span class="menu-text"> Customer Groups</span>
                                </a>
                            </li>
                            <li>
                                <a href="treeview.html">
                                    <span class="menu-text">Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="treeview.html">
                                    <span class="menu-text">Expense Item</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Product End-->

                    <!-- Dashboard-->
                    <li>
                        <a href="{{route('home')}}">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <!--Dashboard End-->

                    <!--Sale-->
                    <li>
                        <a href="{{route('sale.index')}}">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Sales </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('sale.createPos')}}">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Sales New</span>
                        </a>
                    </li>
                    <!--Sale End-->

                    <!--Purchase-->
                    <li>
                        <a href="{{route('admin.purchase.index')}}">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Purchase </span>
                        </a>
                    </li>
                    <!--Purchase End-->
                    <!--Purchase-->
                    <li>
                        <a href="{{route('admin.purchase.product.receive.index')}}">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span class="menu-text"> Receive Purchase Product </span>
                        </a>
                    </li>
                    <!--Purchase End-->

                    <!--Stock -->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-database"></i>
                            <span class="menu-text">Stocks</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{route('admin.main-stock.index')}}">
                                    <span class="menu-text">Main Stock</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.primary-stock.index')}}">
                                    <span class="menu-text">Showroom Stock</span>
                                    {{--  <span class="menu-text">Primary Stock</span>  --}}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.secondary-stock.index')}}">
                                    <span class="menu-text">Godwon Stock</span>
                                    {{--  <span class="menu-text">Secondary Stock</span>  --}}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Stock End-->

                    <!--Damage-->
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-trash"></i>
                            <span class="menu-text"> Damage </span>
                        </a>
                    </li>
                    <!--Damage End-->

                    <!--Expense-->
                    <li>
                        <a href="calendar.html">
                            <i class="menu-icon glyphicon glyphicon-usd"></i>
                            <span class="menu-text">
                                Expense
                            </span>
                        </a>
                    </li>
                    <!--Expense End-->
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-usd"></i>
                            <span class="menu-text"> Supplier Due Payments </span>
                        </a>

                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-usd"></i>
                            <span class="menu-text"> Customer Due Receive</span>
                        </a>

                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-usd"></i>
                            <span class="menu-text"> Sales Returns </span>
                        </a>

                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-usd"></i>
                            <span class="menu-text"> Purchase Return </span>
                        </a>

                    </li>

                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-envelope"></i>
                            <span class="menu-text"> Send SMS </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-time"></i>
                            <span class="menu-text"> HRM </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-time"></i>
                            <span class="menu-text"> Quatation </span>
                        </a>

                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-print"></i>
                            <span class="menu-text"> Report </span>
                        </a>
                    </li>
                    <!--Product-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-database"></i>
                            <span class="menu-text"> Accounts </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="{{route('admin.account.index')}}">
                                    <span class="menu-text">Accounts</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.bank.index')}}">
                                    <span class="menu-text">Banks</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--Product End-->
                    <li>
                        <a href="widgets.html">
                            <i class="menu-icon fa fa-money"></i>
                            <span class="menu-text"> Accounts </span>
                        </a>
                    </li>
                    <li>
                        <a href="databoxes.html">
                            <i class="menu-icon glyphicon glyphicon-cog"></i>
                            <span class="menu-text"> Shop Settings </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-cog"></i>
                            <span class="menu-text"> Setting </span>

                        </a>

                    </li>

                    <li>
                        <a href="{{route('customer.supplier.index')}}">
                            <span class="menu-text">Customer/Suppliers(Extra)</span>
                        </a>
                    </li>



                    {{--

                    <li>
                        <a href="#">
                            <i class="menu-icon glyphicon glyphicon-download-alt"></i>
                            <span class="menu-text"> Database Backup </span>
                        </a>
                    </li>




                    <!--Widgets-->


                    <!--UI Elements-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Users Managements </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="elements.html">
                                    <span class="menu-text">Admin / Stuff</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('customer.supplier.index')}}">
                    <span class="menu-text">Customer & Suppliers</span>
                    </a>
                    </li>


                </ul>
                </li>
                <!--Tables-->
                <li>
                    <a href="#" class="menu-dropdown">
                        <i class="menu-icon fa fa-database"></i>
                        <span class="menu-text"> Installments </span>

                        <i class="menu-expand"></i>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="tables-simple.html">
                                <span class="menu-text">Installment Customers</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-data.html">
                                <span class="menu-text">Installment Sale</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-data.html">
                                <span class="menu-text">Installment Collection</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--Forms-->
                <li>
                    <a href="index.html">
                        <i class="menu-icon glyphicon glyphicon-edit"></i>
                        <span class="menu-text"> Purchase </span>
                    </a>
                </li>
                <!--Charts-->

                <!--Profile-->

                <!--Mail-->

                <!--Calendar-->

                <!--Pages-->

                <li>
                    <a href="#">
                        <i class="menu-icon glyphicon glyphicon-briefcase"></i>
                        <span class="menu-text"> Diposite Withdraw </span>
                    </a>

                </li>
                ---}}



                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->

            <!-- /Chat Bar -->
            @yield('content')

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="{{ asset('public/frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="{{ asset('public/frontend') }}/js/beyond.js"></script>


    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="{{ asset('public/frontend') }}/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/sparkline/sparkline-init.js"></script>

    <!--Easy Pie Charts Needed Scripts-->
    <script src="{{ asset('public/frontend') }}/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/easypiechart/easypiechart-init.js"></script>

    <!--Flot Charts Needed Scripts-->
    <script src="{{ asset('public/frontend') }}/js/charts/flot/jquery.flot.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="{{ asset('public/frontend') }}/js/charts/flot/jquery.flot.orderbars.js"></script>
    <script>
        // If you want to draw your charts with Theme colors you must run initiating charts after that current skin is loaded
        $(window).bind("load", function() {

                    /*Sets Themed Colors Based on Themes*/
                    themeprimary = getThemeColorFromCss('themeprimary');
                    themesecondary = getThemeColorFromCss('themesecondary');
                    themethirdcolor = getThemeColorFromCss('themethirdcolor');
                    themefourthcolor = getThemeColorFromCss('themefourthcolor');
                    themefifthcolor = getThemeColorFromCss('themefifthcolor');

    </script>


    <!--extra added-->

    <!--sweet alert-->
    <script src="{{asset('public/frontend/sweetalert/sweetalert2@9.js')}}"></script>
    <!--toastr.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- DataTables -->
    <script src="{{ asset('public/frontend') }}/table/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/frontend') }}/table/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/frontend') }}/table/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('public/frontend') }}/table/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
            });
        });

    </script>
    <script>
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Data has been deleted.',
                        'success'
                    )
                }
            })
        });

    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

    </script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>


    @stack('js')

</body>
<!--  /Body -->

</html>