<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title')</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster+Two" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{asset('asset')}}/css/custom.css" />
    <link rel="stylesheet" href="{{asset('asset')}}/ukit/css/uikit.min.css" />
    <link rel="stylesheet" href="{{asset('asset')}}/ukit/css/components/slider.css" />
    <link href="{{asset('asset')}}/ukit/css/uikit.docs.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('asset')}}/css/bootstrap.css">
    <link href="{{asset('asset')}}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset')}}/css/slicknav.css">
    <link rel="stylesheet" href="{{asset('asset')}}/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="{{asset('asset')}}/css/font-awesome.css">--}}
    <link rel="stylesheet" href="{{asset('asset')}}/css/normalize.css">
    <link rel="stylesheet" href="{{asset('asset')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('asset')}}/css/responsive.css">

    <script src="{{asset('asset')}}/js/vendor/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('asset')}}/js/ajaxload.js"></script>
    <link rel="stylesheet" href="{{asset('asset')}}/style.css">
    <link rel="stylesheet" href="{{asset('asset')}}/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <style type="text/css">
        .container {
            position: relative;
            text-align: center;
            color: black;
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            box-shadow: 0px 0px 5px 5px black;

            background: rgba(0,0,0,.6);
        }

        .centered h2{
            font-size: 20px;
            font-weight: bold;  color: white;
        }

        .centered h3{
            font-size: 15px;
            font-weight: bold;
            color: white;
            margin-top: -15px!important;
        }
    </style>

</head>
<body>


    <!-- Header -->
        @include('layouts.navbar')
    <!-- //Header Ends -->


    <!-- Content -->
        @yield('content')
    <!-- //Content -->



<section class="footer_area text-center col-lg-12">
    <p>My Nursery &copy2020 </p>
</section>




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{asset('asset')}}/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="{{asset('asset')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('asset')}}/js/plugins.js"></script>
    <script src="{{asset('asset')}}/js/main.js"></script>


    <!-- this prob-->

    <script src="{{asset('asset')}}/ukit/js/uikit.min.js"></script>
    <script src="{{asset('asset')}}/ukit/js/components/slider.min.js"></script>
    <script src="{{asset('asset')}}/ukit/js/components/datepicker.js"></script>
    <script src="{{asset('asset')}}/ukit/js/components/form-select.js"></script>
    <!-- this prob-->

    <script type="text/javascript">

        $(document).ready(function() {

            $(window).scroll(function () {
                //if you hard code, then use console
                //.log to determine when you want the
                //nav bar to stick.
                console.log($(window).scrollTop())
                if ($(window).scrollTop() > 115) {
                    $('#nav_bar').addClass('navbar-fixed-top');
                }
                if ($(window).scrollTop() < 116) {
                    $('#nav_bar').removeClass('navbar-fixed-top');
                }
            });
        });

    </script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                  toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
        @endif
    </script>

    @stack('js')

</body>
</html>