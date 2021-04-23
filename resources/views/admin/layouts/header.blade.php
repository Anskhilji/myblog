<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adminty - Premium Admin Template by Colorlib </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend\assets\images\favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\icon\themify-icons\themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\icon\icofont\css\icofont.css') }}">

   @if(Request::segment(2) == 'all' && Request::segment(3) == 'category')
           <!-- Data Table Css -->
           <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css') }}">
           <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\pages\data-table\css\buttons.dataTables.min.css') }}">
           <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css') }}">
   @endif

    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\icon\feather\css\feather.css') }}">

    <!-- Style.css -->
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\pages\notification\notification.css') }}">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\animate.css\css\animate.css') }}">
    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\bootstrap-tagsinput\css\bootstrap-tagsinput.css') }}">
    @if(Request::segment(2) == 'create' && Request::segment(3) == 'post')
        <!-- Select 2 css -->
            <link rel="stylesheet" href="{{ asset('backend\bower_components\select2\css\select2.min.css') }}">
            <!-- Multi Select css -->
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\multiselect\css\multi-select.css') }}">
            <!-- Switch component css -->
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\switchery\css\switchery.min.css') }}">
    @endif

    @if(Request::segment(2) == 'post' && Request::segment(3) == 'edit')
        <!-- Select 2 css -->
            <link rel="stylesheet" href="{{ asset('backend\bower_components\select2\css\select2.min.css') }}">
            <!-- Multi Select css -->
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\multiselect\css\multi-select.css') }}">
            <!-- Switch component css -->
            <link rel="stylesheet" type="text/css" href="{{ asset('backend\bower_components\switchery\css\switchery.min.css') }}">
        @endif
@if(Request::segment(1) == 'admin' && Request::segment(2) == 'menu')
        <link rel="stylesheet" href="{{asset('backend/menu/menu.css')}}">
@endif
<!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\icon\font-awesome\css\font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend\assets\css\jquery.mCustomScrollbar.css') }}">
    <script type="text/javascript" src="{{ asset('backend/bower_components/jquery/js/jquery.min.js') }}"></script>
</head>
<!-- Menu sidebar static layout -->

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="{{ route('base_url') }}" target="_blank">
                        <img class="img-fluid" src="{{ asset('backend/assets/images/logo.png') }}" alt="Theme-Logo">
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
            <!-- navbar start -->
                <div class="navbar-container container-fluid">

                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <span>{{ decrypt(Auth::user()->name) }}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="{{ route('change.info') }}">
                                            <i class="feather icon-settings"></i> Change Login Info
                                        </a>
                                    </li>
                                    <a href="{{ route('logout') }}">
                                        <li>
                                            <i class="feather icon-log-out"></i> Logout
                                        </li>
                                    </a>

                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
