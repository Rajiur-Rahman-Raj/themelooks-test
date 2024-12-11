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

    @stack('extra_styles')
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
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                @lang('Admin Action')
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li>
                                                    <a class="text-capitalize"
                                                       href="{{ route('admin.dashboard') }}">@lang('Admin Dashboard')</a>
                                                </li>

                                                <li>
                                                    <a class="text-capitalize "
                                                       href="{{ route('admin.add.product.form') }}">@lang('Add Products')</a>
                                                </li>

                                                <li>
                                                    <a class="text-capitalize "
                                                       href="{{ route('admin.product.list') }}">@lang('Product List')</a>
                                                </li>

                                                <li>
                                                    <a class="text-capitalize "
                                                       href="{{ route('admin.order.list') }}">@lang('Order List')</a>
                                                </li>


                                                @if(auth('admin')->check())
                                                    <li>
                                                        <a class="text-capitalize" href="{{ route('admin.logout') }}"
                                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Logout')</a>
                                                        <form id="logout-form" action="{{ route('admin.logout') }}"
                                                              method="POST"
                                                              class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>

                                        <li>
                                            <a class="text-capitalize {{ activeMenu(['products']) }}"
                                               href="{{ route('products') }}"> @lang('Products')</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="right-column d-flex align-items-center">
                        @if(auth('web')->check())
                            <div class="nav-outer">
                                <div class="mobile-nav-toggler"><img
                                        src="http://127.0.0.1/courier/assets/themes/light/img/icons/icon-bar.png"
                                        alt="icon"></div>
                                <nav class="main-menu navbar-expand-md navbar-light">
                                    <div class="collapse navbar-collapse show " id="navbarSupportedContent">
                                        <ul class="navigation">

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @lang('User Action')
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li>
                                                        <a class="text-capitalize"
                                                           href="{{ route('user.dashboard') }}">
                                                            @lang('User Dashboard')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="text-capitalize"
                                                           href="{{ route('user.order.list') }}">@lang('Order list')</a>
                                                    </li>

                                                    <li>
                                                        <a class="text-capitalize" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('Log Out')</a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                              method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        @else
                            <div class="header-right-inner me-3">
                                <div class="sign-up">
                                    <a href="{{ route('login') }}" class="header-right-icon"
                                       title="user login"><i
                                            class="fa-light fa-user"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- mobile menu -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="fal fa-times"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ url('/') }}"><img
                            src="https://themelooks.com/wp-content/uploads/2019/06/logo.png" alt="logo"></a></div>
                <div class="menu-outer">

                </div>
            </nav>
        </div>
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
<script src="{{ asset('assets/js/socialSharing.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr-min.js') }}"></script>
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
