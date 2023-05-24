<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>e-RM RS. Harapan Keluarga | @yield('judul')</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.c')}}ss" rel="stylesheet">
    <link href="{{asset('/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <link href="{{asset('/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/themes/all-themes.css')}}" rel="stylesheet" />
    @stack('style')
</head>

<style>
    /* .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }  */
    .kbw-signature {
        width: 200px !important;
        height: 200px;
        display: inline-block;
        border: 2px solid #a0a0a0;
        /* -ms-touch-action: none; */
    }

    .kbw-signature-disabled {
        opacity: 0.35;
    }

    #sig canvas {
        width: 100% !important;
        height: 200px;
        overflow: hidden;
        background-color: brown;
    }

    .scroll-indicator {
        position: fixed;
        top: 0%;
        left: 0;
        height: .2rem;
        background: #1cc88a;
        z-index: 995;
    }
</style>
<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Cari Pasien...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>