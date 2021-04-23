<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ary-themes.com/html/noor_tech/newspoint/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 05:07:18 GMT -->
<head>
   @include('frontend.layouts.metas')
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('frontend/css/color-switcher-design.css') }}" rel="stylesheet">

    <!--<link href="css/color.css" rel="stylesheet">-->

    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('frontend/css/color-themes/default-theme.css') }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
       <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <style>
        .drop-bg {
            background: #fa2964;
        }
        .footer-cptf{
            display: flex;
            justify-content: center;
        }

        .footer-cptf a{
            padding: 30px 10px 10px 10px;
            color: #ffffff;
            text-decoration: underline;
        }

    </style>

</head>

<body>
<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header / Header Style Three -->
    <header class="main-header header-style-three">
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-outer">
                        <div class="logo"><a href="{{ route('base_url') }}"><span class="letter">B</span><img src="{{ \App\Models\Setting::first()->logo_image }}" alt="logo" /></a></div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php
                        $menus = \App\Models\Setting::first();
                        $menus_decode = json_decode($menus->menu);
//                        dd(request()->fullUrl());
                        $_segment = request()->segment(1);
                        ?>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                               @foreach($menus_decode as $menu)
                                       <?php
                                        $_link = ($menu->link == '#' || $menu->link == '/') ? "" : $menu->link;
                                        $full_URL = request()->fullUrl().'/';
                                        $current_url =  str_replace($full_URL ,"", $_link);

                                        $_active = ($current_url == $_segment) ? "current" : "";
                                        ?>

                                    <li class="{{$_active}}">
                                    @if(!empty($menu->children))
                                        <?php
                                           foreach ($menu->children as $slug){
                                            $act =  $_segment == $slug->link ? 'current' : '';
                                           }
                                        ?>
                                                <li class="dropdown {{ $act }}">
                                                    <a href="{{$menu->link }}">{{ $menu->title }}</a>
                                                    <ul>
                                                        @foreach($menu->children as $cat2)
                                                        <?php
                                                            $act_bg =  $_segment == $cat2->link ? 'drop-bg' : '';
                                                        ?>
                                                        <li class="{{ $act_bg }}">
                                                            <a href="{{$cat2->link }}">{{ $cat2->title }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                        @else
                                        <a href="{{ $menu->link }}">{{ $menu->title }}</a>
                                        @endif
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box" style="display: none">
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="http://ary-themes.com/html/noor_tech/newspoint/blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                        <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{ route('base_url') }}" title=""><span class="letter">B</span><img src="{{ asset('frontend/images/small-logo.png') }}" alt="" /></a>
                </div>
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1"><ul class="navigation clearfix">
                                <li class="{{ (get_postid('page_id') == 1) ? 'current' : '' }}"><a href="{{ route('base_url') }}">Home</a></li>
                                <li class="dropdown"><a href="#">Categories</a>
                                    <ul>
                                        @foreach($categories as $cat)
                                            <li class="{{ request()->is(get_postid('post_id') == $cat->id) ? 'drop-bg' : '' }}">
                                                <a href="{{ url($cat->slug.'-'.'1'.$cat->id) }}">{{ $cat->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="{{ request()->is('contact-us') ? 'current' : '' }}"><a href="{{ route('contact-us') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->
    </header>
    <!--End Header Style Three -->

    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar left-align">

        <div class="hidden-bar-closer">
            <button><span class="qb-close-button"></span></button>
        </div>

        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
            <div class="logo">
                <a href="{{ route('base_url') }}"><span class="letter">B</span><img src="{{ asset('frontend/images/mobile-logo.png') }}" alt="" /></a>
            </div>
            <!-- .Side-menu -->
            <div class="side-menu">
                <!--navigation-->
                <ul class="navigation clearfix">
                    <li class="{{ (get_postid('page_id') == 1) ? 'current' : '' }}"><a href="{{ route('base_url') }}">Home</a></li>
                    <li class="dropdown"><a href="#">Categories</a>
                        <ul>
                            @foreach($categories as $cat)
                                <li class="{{ request()->is(get_postid('post_id') == $cat->id) ? 'drop-bg' : '' }}">
                                    <a href="{{ url($cat->slug.'-'.'1'.$cat->id) }}">{{ $cat->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ request()->is('contact-us') ? 'current' : '' }}"><a href="{{ route('contact-us') }}">Contact</a></li>
                </ul>
            </div>
            <!-- /.Side-menu -->

            <!--Options Box-->
            <div class="options-box">
                <!--Sidebar Search-->
                <div class="sidebar-search">
                    <form method="post" action="http://ary-themes.com/html/noor_tech/newspoint/contact.html">
                        <div class="form-group">
                            <input type="search" name="text" value="" placeholder="Search ..." required="">
                            <button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
                        </div>
                    </form>
                </div>

                <!--Social Links-->
                <ul class="social-links clearfix">
                    <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                </ul>

            </div>

        </div><!-- / Hidden Bar Wrapper -->

    </section>
    <!-- End / Hidden Bar -->
