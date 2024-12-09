<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @yield('title')
    </title>

    <link href="https://themelooks.com/wp-content/uploads/2016/09/cropped-favicon-32x32.png" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}"/>
</head>
<body>

<div class="page-wrapper">
    <header class="main-header header-style-one">

        <div class="header-lower">
            <div class="container">
                <div class="inner-container d-flex align-items-center justify-content-between">

                    <div class="left-column">
                        <div class="logo-box">
                            <div class="logo">
                                <a href="http://127.0.0.1/courier">
                                    <img src="https://themelooks.com/wp-content/uploads/2019/06/logo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="middle-column d-flex align-items-center">
                        <div class="nav-outer">
                            <div class="mobile-nav-toggler"><img
                                    src="http://127.0.0.1/courier/assets/themes/light/img/icons/icon-bar.png"
                                    alt="icon"></div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        <li>
                                            <a class="text-capitalize " href="http://127.0.0.1/courier">Add Products</a>
                                        </li>
                                        <li>
                                            <a class="text-capitalize " href="http://127.0.0.1/courier/about">Product List</a>
                                        </li>
                                        <li>
                                            <a class="text-capitalize active" href="http://127.0.0.1/courier/products"> Buy Products</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="right-column d-flex align-items-center">
                        <div class="header-right-inner me-3">
                            <div class="sign-up">
                                <a href="http://127.0.0.1/courier/login" class="header-right-icon"><i
                                        class="fa-light fa-user"></i></a>
                            </div>

                        </div>

                        <div class="nav-outer">
                            <div class="mobile-nav-toggler"><img
                                    src="http://127.0.0.1/courier/assets/themes/light/img/icons/icon-bar.png"
                                    alt="icon"></div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        <li>
                                            <a class="text-capitalize " href="http://127.0.0.1/courier">User Product List</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @push('js-lib')

        @endpush

        @push('script')
            <script>
            </script>
        @endpush

    </header>

    @yield('content')
</div>


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/notiflix-aio-3.2.6.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.paroller.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

@stack('js-lib')
@stack('script')


<script>


</script>

@if (session()->has('success'))
    <script>
        Notiflix.Notify.success("@lang(session('success'))");
    </script>
@endif

@if (session()->has('error'))
    <script>
        Notiflix.Notify.failure("@lang(session('error'))");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Notiflix.Notify.warning("@lang(session('warning'))");
    </script>
@endif
</body>
</html>
