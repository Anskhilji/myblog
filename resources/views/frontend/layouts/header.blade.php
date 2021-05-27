<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ary-themes.com/html/noor_tech/newspoint/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Mar 2021 05:07:18 GMT -->
<head>
   @include('frontend.layouts.metas')
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <style>
        /*Start Style.css*/
        * {
            margin:0px;
            padding:0px;
            border:none;
            outline:none;
        }
        body {
            font-size:14px;
            color:#666666;
            line-height:1.8em;
            font-weight:400;
            background:#ffffff;
            background-size:cover;
            background-repeat:no-repeat;
            background-position:center top;
            -webkit-font-smoothing: antialiased;
            font-family: 'Poppins', sans-serif;
        }

        a{
            text-decoration:none;
            cursor:pointer;
            color:#fa2964;
        }

        a:hover,a:focus,a:visited{
            text-decoration:none;
            outline:none;
        }

        h1,h2,h3,h4,h5,h6 {
            position:relative;
            font-weight:normal;
            margin:0px;
            background:none;
            line-height:1.4em;
            font-family: 'Roboto Slab', serif;
        }

        p,
        .text{
            position:relative;
            line-height:1.8em;
            font-family: 'Poppins', sans-serif;
        }
        .auto-container{
            position:static;
            max-width:1200px;
            padding:0px 15px;
            margin:0 auto;
        }

        .page-wrapper{
            position:relative;
            margin:0 auto;
            width:100%;
            min-width:300px;
        }

        ul,li{
            list-style:none;
            padding:0px;
            margin:0px;
        }

        .theme-btn{
            display:inline-block;
            text-align:center;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }

        .btn-style-one{
            position:relative;
            padding:10px 26px;
            line-height:24px;
            color:#ffffff;
            text-align:center;
            font-size:12px;
            font-weight:500;
            background:none;
            letter-spacing:1px;
            border-radius:0px;
            border:2px solid #ffffff;
            text-transform:uppercase;
        }

        .social-icon-one{
            position:relative;
        }
        img{
            display:inline-block;
            max-width:100%;
        }

        .preloader{ position:fixed; left:0px; top:0px; width:100%; height:100%; z-index:999999; background-color:#ffffff; background-position:center center; background-repeat:no-repeat; background-image:url(../images/icons/preloader.svg); background-size:80px;}

        .scroll-to-top{
            position:fixed;
            bottom:15px;
            right:15px;
            width:50px;
            height:50px;
            color:#ffffff;
            font-size:13px;
            text-transform:uppercase;
            line-height:50px;
            text-align:center;
            z-index:100;
            cursor:pointer;
            background:#27292d;
            display:none;
            opacity:1 !important;
            -webkit-transition:all 300ms ease;
            -ms-transition:all 300ms ease;
            -o-transition:all 300ms ease;
            -moz-transition:all 300ms ease;
            transition:all 300ms ease;
        }

        .main-header{
            position:relative;
            left:0px;
            top:0px;
            width:100%;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
        }

        .sticky-header{
            position:fixed;
            opacity:0;
            visibility:hidden;
            left:0px;
            top:0px;
            width:100%;
            padding:0px 0px;
            background:#ffffff;
            z-index:0;
            border-bottom:1px solid #cccccc;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
        }
        .sticky-header .logo a{
            position:relative;
            display:block;
            margin-top:5px;
        }
        .main-header .header-upper{
            position:relative;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
            z-index:5;
        }

        .main-header .logo-outer{
            position:relative;
            z-index:25;
            text-align:center;
            padding:32px 0px;
        }

        .main-header .logo-outer .logo{
            position:relative;
        }

        .main-header .logo-outer .logo .letter{
            position:relative;
            top:4px;
            color:#fa2964;
            font-weight:700;
            font-size:75px;
            line-height:1em;
            float:left;
            text-transform:uppercase;
        }

        .main-header .logo-outer .logo a{
            position:relative;
            display:inline-block;
        }
        .main-header .logo-outer .logo img{
            position:relative;
            float:left;
        }
        .main-menu{
            position:relative;
        }

        .main-menu .navbar-collapse{
            padding:0px;
        }

        .main-menu .navigation{
            position:relative;
            margin:0px;
        }

        .main-menu .navigation > li{
            position:relative;
            float:left;
            padding:0px;
            border-left:1px solid #f5f4f4;
        }

        .main-menu .navigation > li:last-child{
            border-right:1px solid #f5f4f4;
        }

        .sticky-header .main-menu .navigation > li{
            padding:0px;
            margin-right:0px;
        }

        .main-menu .navigation > li > a{
            position:relative;
            display:block;
            padding:17px 24px;
            font-size:14px;
            color:#777777;
            line-height:30px;
            font-weight:500;
            opacity:1;
            letter-spacing:1px;
            text-transform:uppercase;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
        }

        .main-menu .navigation > li:hover > a::before,
        .main-menu .navigation > li.current > a:before{
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity:1;
        }

        .main-menu .navigation > li > a:before{
            content: "";
            position: absolute;
            z-index: -1;
            left: 0;
            right: 0;
            bottom: 0;
            background: #fa2964;
            height: 4px;
            opacity:0;
            -webkit-transform: translateY(4px);
            transform: translateY(4px);
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        .sticky-header .main-menu .navigation > li > a{
            padding:13px 15px !important;
            color:#333333;
        }

        .sticky-header .main-menu .navigation > li.dropdown > a:before{
            display:none;
        }

        .main-menu .navigation > li > ul{
            position:absolute;
            left:0px;
            top:120%;
            width:240px;
            z-index:100;
            display:none;
            padding:0px 0px;
            background:#101010;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
            -webkit-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
            -ms-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
            -o-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
            -moz-box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
            box-shadow:2px 2px 5px 1px rgba(0,0,0,0.05),-2px 0px 5px 1px rgba(0,0,0,0.05);
        }

        .main-menu .navigation > li > ul > li{
            position:relative;
            width:100%;
            border-bottom:1px solid rgba(255,255,255,0.10);
        }

        .main-menu .navigation > li > ul > li:last-child{
            border-bottom:none;
        }

        .main-menu .navigation > li > ul > li > a{
            position:relative;
            display:block;
            padding:12px 20px;
            line-height:22px;
            font-weight:500;
            font-size:14px;
            color:#e0e0e0;
            text-align:left;
            text-transform:capitalize;
            transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
        }
        .main-menu .navigation li.dropdown .dropdown-btn{
            position:absolute;
            right:10px;
            top:6px;
            width:34px;
            height:30px;
            border:1px solid #ffffff;
            text-align:center;
            font-size:16px;
            line-height:26px;
            color:#ffffff;
            cursor:pointer;
            z-index:5;
            display:none;
        }

        .main-header .header-lower{
            position:relative;
            border-top:1px solid #f5f4f4;
        }

        .main-header .nav-outer{
            position:relative;
        }

        .main-header .outer-box{
            position:absolute;
            right:0px;
            top:0px;
        }
        .sec-title{
            position:relative;
            margin-bottom:42px;
            background-color:#f3f3f3;
        }

        .sec-title h2{
            position:relative;
            color:#ffffff;
            font-size:12px;
            letter-spacing:1px;
            padding:9px 15px;
            font-weight:400;
            text-transform:uppercase;
            display:inline-block;
            margin:0px;
            background-color:#fa2964;
        }

        .news-block-one{
            position:relative;
            margin-bottom:30px;
        }

        .news-block-one .inner-box{
            position:relative;
        }

        .news-block-one .inner-box .image{
            position:relative;
        }

        .news-block-one .inner-box .image img{
            position:relative;
            width:100%;
            display:block;
        }
        .news-block-one .inner-box .lower-box{
            position:relative;
            text-align:center;
            padding-top:30px;
        }

        .news-block-one .inner-box .lower-box h3{
            position:relative;
            font-size:16px;
            font-weight:700;
            letter-spacing:2px;
            margin-bottom:5px;
            text-transform:uppercase;
        }

        .news-block-one .inner-box .lower-box h3 a{
            color:#232323;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }
        .news-block-one .inner-box .image a:before{
            position:absolute;
            content:'';
            left:0px;
            top:0px;
            width:100%;
            height:0px;
            display:block;
            z-index:1;
            opacity:0.7;
            background-color:#000000;
            transition: all 0.6s ease;
            -moz-transition: all 0.6s ease;
            -webkit-transition: all 0.6s ease;
            -ms-transition: all 0.6s ease;
            -o-transition: all 0.6s ease;
        }

        .news-block-one .inner-box:hover .image a:before{
            height:100%;
        }

        .news-block-one .inner-box .lower-box .post-date{
            position:relative;
            color:#a7a7a7;
            font-size:12px;
            font-style:italic;
            font-weight:300;
        }

        .news-block-one .inner-box .lower-box .text{
            position:relative;
            color:#616060;
            font-size:14px;
            line-height:1.8em;
            margin-top:15px;
            margin-bottom:20px;
        }

        .news-block-one .inner-box .lower-box .read-more{
            position:relative;
            color:#fa2964;
            font-size:14px;
            letter-spacing:1px;
        }
        .news-block-one .inner-box .lower-box .read-more .arrow{
            position:relative;
            top:3px;
            font-size:18px;
            margin-left:3px;
        }
        .main-footer{
            position:relative;
            background-color:#28292d;
        }

        .main-footer .widgets-section{
            position:relative;
            padding-top:70px;
            padding-bottom:20px;
        }

        .main-footer .widgets-section .footer-widget{
            position:relative;
            margin-bottom:30px;
        }

        .main-footer .widgets-section .footer-widget h2{
            position:relative;
            font-size:14px;
            font-weight:700;
            color:#ffffff;
            letter-spacing:1px;
            padding-bottom:10px;
            margin-bottom:30px;
            text-transform:uppercase;
            border-bottom:2px solid rgba(255,255,255,0.10);
        }

        .main-footer .newsletter-widget .form-group{
            position:relative;
            display:block;
            margin-bottom:10px;
        }

        .main-footer .newsletter-widget .form-group input[type="text"],
        .main-footer .newsletter-widget .form-group input[type="email"]{
            position:relative;
            display:block;
            width:100%;
            line-height:26px;
            padding:10px 20px;
            height:48px;
            font-size:15px;
            color:#ffffff;
            background-color:#444444;
            -webkit-transition:all 300ms ease;
            -ms-transition:all 300ms ease;
            -o-transition:all 300ms ease;
            -moz-transition:all 300ms ease;
            transition:all 300ms ease;
        }

        .main-footer .newsletter-widget .form-group button{
            width:100%;
        }
        .main-footer .footer-bottom{
            position:relative;
            padding:50px 0px 0px;
            background-color:#1a1c1e;
        }
        .main-footer .footer-bottom .copyright-section{
            position:relative;
            padding:15px 0px;
            margin-top:40px;
            border-top:1px solid rgba(255,255,255,0.10);
        }
        .main-footer .footer-bottom .copyright-section .copyright{
            position:relative;
            color:#ffffff;
            text-align:right;
        }
        .hidden-bar{
            position: fixed;
            top: 0;
            width: 100%;
            height: 100%;
            background: #232323;
            z-index: 9999;
            transition: all 700ms ease;
            -webkit-transition: all 700ms ease;
            -ms-transition: all 700ms ease;
            -o-transition: all 700ms ease;
            -moz-transition: all 700ms ease;
        }
        .hidden-bar.left-align {
            left: -400px;
        }
        .hidden-bar.left-align {
            left: -100%;
        }
        .hidden-bar .hidden-bar-closer {
            width: 40px;
            height: 40px;
            position: absolute;
            right: 10px;
            top:5px;
            background: none;
            color: #ffffff;
            border-radius: 0px;
            text-align: center;
            line-height: 40px;
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            z-index: 999999;
        }
        .hidden-bar .hidden-bar-closer button {
            background: none;
            display:block;
            font-size: 20px;
            color:#656565;
            width:40px;
            height:40px;
            line-height:40px;
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
        }
        .hidden-bar-wrapper {
            height: 100%;
            padding:10px 30px 40px;
            padding-right:0px;
        }
        .hidden-bar .logo {
            position:relative;
            padding: 0px 0px 0px;
            text-align:center;
            width:270px;
            height:60px;
            margin:0 auto;
            right:20px;
            margin-top:20px;
            margin-bottom:20px;
        }

        .hidden-bar .logo a{
            position:relative;
            width:270px;
            height:60px;
            display:block;
        }

        .hidden-bar .logo a .letter{
            position:relative;
            color:#fa2964;
            font-size:46px;
            font-weight:700;
            line-height:1.7em;
            float:left;
            top:2px;
            text-transform:uppercase;
        }
        .hidden-bar .logo img{
            float:left;
            max-width:100%;
        }

        .hidden-bar .side-menu {
            background-color: transparent;
            padding: 0;
            font-size:13px;
            text-align:center;
            padding-right:40px;
        }

        .hidden-bar .side-menu ul li ul a {
            background: transparent;
        }
        .hidden-bar .side-menu ul li{
            position:relative;
            display:block;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .hidden-bar .side-menu > ul > li > ul{
            background-color:#2a2a2a;
        }

        .hidden-bar .side-menu ul.navigation > li > ul > li:first-child{
            border-top: 1px solid rgba(255,255,255,0.15);
        }

        .hidden-bar .side-menu ul.navigation > li > ul > li:last-child{
            border-bottom:none;
        }
        .hidden-bar .side-menu ul li a {
            background: transparent;
            color: #ffffff;
            display: inline-block;
            font-weight: 400;
            text-transform: uppercase;
            padding: 12px 15px 12px 0px;
            position: relative;
            line-height:24px;
            font-size:13px;
            transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            letter-spacing:1px;
        }

        .hidden-bar .side-menu ul.navigation > li > ul > li > a{
            text-transform:uppercase;
            padding-left:22px;
            font-size:13px;
            color:rgba(255,255,255,0.50);
        }
        .hidden-bar .side-menu ul.navigation > li.dropdown > a{

        }

        .hidden-bar .side-menu > ul > li.dropdown > a:after{
            position:absolute;
            content:'\f107';
            right:0px;
            top:13px;
            font-size:14px;
            font-family: 'FontAwesome';
        }
        .hidden-bar .social-links{
            position:relative;
            margin-right:40px;
            text-align:center;
            font-size:13px;
            line-height:20px;
            color:#999999;
            margin-top:35px;
            padding-top:20px;
            border-top:1px solid rgba(255,255,255,0.10);
        }

        .hidden-bar .social-links li{
            position:relative;
            display:inline-block;
            line-height:20px;
        }
        .hidden-bar .social-links li a{
            display:block;
            color:#999999;
            font-size:18px;
            padding:0px 12px 0px 14px;
            transition:all 500ms ease;
            border-left:1px solid rgba(255,255,255,0.10);
        }

        .hidden-bar .social-links li:last-child a{
            border-right:1px solid rgba(255,255,255,0.10);
        }
        .main-header .nav-toggler{
            position:absolute;
            right:0px;
            top:-75px;
            z-index:12;
            display:none;
        }
        .hidden-bar .hidden-bar-wrapper .sidebar-search{
            position:relative;
            margin-top:26px;
            padding-right:40px;
            margin-bottom:18px;
        }

        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group{
            position:relative;
        }

        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group input[type="text"],
        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group input[type="search"]{
            position: relative;
            display: block;
            width: 100%;
            line-height: 24px;
            padding: 10px 16px 10px 25px;
            height: 46px;
            color:rgba(255,255,255,0.50);
            font-size: 14px;
            background: #1f1f1f;
            -webkit-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            transition: all 300ms ease;
            text-transform:uppercase;
        }
        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group input::-webkit-input-placeholder{
            color:rgba(255,255,255,0.50);
            font-size: 14px;
            letter-spacing:1px;
        }

        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group input[type="submit"],
        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group button {
            color: #999999;
            font-size: 16px;
            height: 46px;
            background:none;
            position: absolute;
            right: 0;
            text-align: left;
            top: 0;
            width: 36px;
        }
        .hidden-bar .hidden-bar-wrapper .sidebar-search .form-group button span {
            padding-left: 0 !important;
            padding-right: 8px;
        }
        .sidebar-widget{
            position: relative;
            margin-bottom:40px;
        }

        .sidebar-title{
            position:relative;
            margin-bottom:30px;
            background-color:#f3f3f3;
        }

        .sidebar-title h2{
            position:relative;
            color:#ffffff;
            padding:9px 20px;
            font-weight:400;
            font-size:12px;
            letter-spacing:1px;
            display:inline-block;
            background-color:#fa2964;
            text-transform:uppercase;
        }
        .sidebar-social-widget{
            margin-bottom:30px;
        }
        .widget-post{
            position:relative;
            font-size:14px;
            color:#666666;
            padding:0px 0px;
            padding-left:105px;
            min-height:100px;
            margin-bottom:20px;
            border-bottom:1px solid #eeeeee;
        }

        .widget-post:last-child{
            margin-bottom:0px;
            border:0px;
            min-height:80px;
        }

        .widget-post .post-thumb{
            position:absolute;
            left:0px;
            top:0px;
            width:85px;
            background-color:#e9ebee;
        }

        .widget-post .post-thumb > a{
            position:relative;
            display:block;
        }
        .widget-post .post-thumb a:before{
            position:absolute;
            content:'';
            left:0px;
            top:0px;
            width:100%;
            height:100%;
            display:block;
            z-index:99;
            opacity:0;
            -webkit-transition:all 500ms ease;
            -ms-transition:all 500ms ease;
            -o-transition:all 500ms ease;
            -moz-transition:all 500ms ease;
            transition:all 500ms ease;
            background-color:rgba(255,255,255,0.50);
        }
        .widget-post .post-thumb .overlay{
            position:absolute;
            content:'';
            left:0px;
            top:0px;
            width:100%;
            height:100%;
            display:block;
            z-index:10;
            opacity:0;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }
        .widget-post .post-thumb .overlay .icon{
            position:relative;
            width:30px;
            height:30px;
            color:#ffffff;
            text-align:center;
            line-height:26px;
            font-size:10px;
            padding-left:3px;
            border-radius:50%;
            display:block;
            margin:0 auto;
            top:50%;
            margin-top:-16px;
            border:3px solid #ffffff;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }
        .widget-post .post-thumb img{
            display:block;
            width:100%;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }

        .widget-post .text{
            position:relative;
            top:-4px;
            font-size:15px;
            margin:0px 0px 0px;
            font-weight:500;
            color:#333333;
            line-height:1.6em;
            text-transform:capitalize;
        }

        .widget-post .text a{
            color:#000000;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }
        .widget-post a,
        .widget-post a:hover{
            color:#fa2964;
        }

        .widget-post .post-info{
            position:relative;
            font-size:11px;
            color:#777777;
            font-weight:400;
            padding-left:20px;
            text-transform:uppercase;
        }

        .widget-post .post-info:before{
            position:absolute;
            content: "\e943";
            left:0px;
            top:1px;
            font-size:12px;
            color:#999999;
            font-weight:300;
            font-family: 'quebec';
        }
        .cat-list{
            position:relative;
            z-index:99;
            background-color:#ffffff;
        }

        .cat-list li{
            position:relative;
            padding-left:20px;
            padding-bottom:10px;
            margin-bottom:10px;
            border-bottom:1px solid #eeeeee;
        }

        .cat-list li:before{
            position:absolute;
            content:'';
            left:0px;
            top:12px;
            width:5px;
            height:5px;
            background-color:#d3d3d3;
        }
        .cat-list li a{
            position:relative;
            color:#777777;
            font-size:13px;
            font-weight:400;
            letter-spacing:1px;
            text-transform:uppercase;
            transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -webkit-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
        }
        .cat-list li a span{
            float:right;
        }
        .sidebar-page-container{
            position:relative;
            padding:100px 0px 100px;
        }
        .sidebar-page-container .content-side,
        .sidebar-page-container .sidebar-side{
            margin-bottom:0px;
        }

        /*End Style.css*/


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

        .form-group {
            margin-bottom: 1rem
        }

        .dropdown, .dropleft, .dropright, .dropup {
            position: relative
        }
        .navbar-collapse {
             -ms-flex-preferred-size: 100%;
             flex-basis: 100%;
             -ms-flex-positive: 1;
             flex-grow: 1;
             -ms-flex-align: center;
             align-items: center
         }

        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: .25rem
        }
        .navbar-toggler:not(:disabled):not(.disabled) {
            cursor: pointer
        }
        .pagination {
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .25rem
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6
        }
        .page-link:not(:disabled):not(.disabled) {
            cursor: pointer
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .page-item:last-child .page-link {
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }
        .clearfix::after {
            display: block;
            clear: both;
            content: ""
        }
    /*   Start footer newslater*/
        .newsletter-widget > h1{
            color: #ffffff;
        }
    /*  End  footer newslater*/
    </style>
       <link rel="preload" href="{{ asset('frontend/css/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
       <noscript><link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"></noscript>

       <link rel="preload" href="{{ asset('frontend/css/bootstrap.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
       <noscript><link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}"></noscript>
       <!-- Stylesheets -->
       <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
       <!--Color Switcher Mockup-->
       <link href="{{ asset('frontend/css/color-switcher-design.css') }}" rel="stylesheet">

       <!--<link href="css/color.css" rel="stylesheet">-->

       <!--Color Themes-->
       <link id="theme-color-file" href="{{ asset('frontend/css/color-themes/default-theme.css') }}" rel="stylesheet">

       <!--Favicon-->
       <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
       <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>

<body>
<div class="page-wrapper">
    <!-- Preloader -->
{{--    <div class="preloader"></div>--}}

    <!-- Main Header / Header Style Three -->
    <header class="main-header header-style-three">
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-outer">
                        <div class="logo">
                            <a href="{{ route('base_url') }}">
                                <span class="letter">B</span>
                                <img src="{{ \App\Models\Setting::first()->logo_image }}" width="226" height="80" alt="logo" />
                            </a>
                        </div>
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
                    <a href="{{ route('base_url') }}" title=""><span class="letter">B</span><img src="{{ asset('frontend/images/small-logo.png') }}" width="122" height="43" alt="" /></a>
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
                <a href="{{ route('base_url') }}"><span class="letter">B</span><img src="{{ asset('frontend/images/mobile-logo.png') }}" width="226" height="80" alt="" /></a>
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
