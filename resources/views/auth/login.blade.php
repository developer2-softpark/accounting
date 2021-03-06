
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('public/frontend') }}/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{ asset('public/frontend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="../fonts.googleapis.com/css@family=open+sans_3a300italic,400italic,600italic,700italic,400,600,700,300.css" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link href="{{ asset('public/frontend') }}/css/beyond.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/demo.min.css" rel="stylesheet" />
    <link href="{{ asset('public/frontend') }}/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="{{ asset('public/frontend') }}/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">SIGN IN</div>
             
            <div class="loginbox-or">
                <div class="or-line"></div>
                 
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
            <div class="loginbox-textbox">
                <input type="text" name="email" class="form-control" placeholder="Email" />
            </div>
            <div class="loginbox-textbox">
                <input type="password"  name="password" class="form-control" placeholder="Password" />
            </div>
             
            <div class="loginbox-submit">
                <button class="btn btn-primary">Login</button>
            </div>
             
            </form>

        </div>
      
    </div>

    <!--Basic Scripts-->
    <script src="{{ asset('public/frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="{{ asset('public/frontend') }}/js/beyond.js"></script>

    
</body>
<!--Body Ends-->
</html>
