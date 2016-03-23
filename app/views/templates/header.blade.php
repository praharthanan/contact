<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-title" content="Address Book">
        <meta name="application-name" content="Address Book">
        <link rel="icon" type="image/png" href="{{ URL::to('/images/logo.png')}} " sizes="192x192">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-TileImage" content="{{ URL::to('/images/logo.png')}} ">
        <meta name="theme-color" content="#ffffff">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        @yield('title')
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/style.css') }}
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ HTML::image('/images/logo.png') }}</a>
                </div>

                <div class="text-uppercase text-center titles nav  navbar-nav">
                    <header>Address Book</header>
                </div>
                <div style="height: 1px;" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        <li><a href="{{URL::to('logout')}}">Log Out</a></li>
                        @endif
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </div>
        @include('templates.messages')
