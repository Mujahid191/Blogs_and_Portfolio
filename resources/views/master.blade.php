@php
    $footer = App\Models\footer::first();
@endphp
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rasalina | @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    </head>
    <body>

        <!-- preloader-start -->
        <div id="preloader">
            <div class="rasalina-spin-box"></div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu__area transparent-header">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu__wrap">
                                <nav class="menu__nav">
                                    <div class="logo">
                                        <a href="{{ route('home') }}" class="logo__black"><img src="{{ asset('frontend/img/logo/logo_black.png') }}" alt=""></a>
                                        <a href="{{ route('home') }}" class="logo__white"><img src="{{ asset('frontend/img/logo/logo_white.png') }}" alt=""></a>
                                    </div>
                                    <div class="navbar__wrap main__menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                                            <li class="{{ request()->routeIs('services') ? 'active' : '' }}"><a href="{{ route('services') }}">Services</a></li>
                                            <li class="{{ request()->routeIs('portfolio') ? 'active' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                            <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}">Our Blog</a></li>
                                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">contact me</a></li>
                                        </ul>
                                    </div>
                                    <div class="header__btn d-none d-md-block">
                                        <a href="{{ route('contact') }}" class="btn">Contact me</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile__menu">
                                <nav class="menu__box">
                                    <div class="close__btn"><i class="fal fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="index.html" class="logo__black"><img src="{{ asset('frontend/img/logo/logo_black.png') }}" alt=""></a>
                                        <a href="index.html" class="logo__white"><img src="{{ asset('frontend/img/logo/logo_white.png') }}" alt=""></a>
                                    </div>
                                    <div class="menu__outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu__backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- main-area -->

        @yield('content')

        <!-- main-area-end -->



        <!-- Footer-area -->
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Contact us</h5>
                                <h4 class="title">{{ $footer->number }}</h4>
                            </div>
                            <div class="footer__widget__text">
                                <p>{{ $footer->short_title }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">my address</h5>
                                <h4 class="title">{{ $footer->country }}</h4>
                            </div>
                            <div class="footer__widget__address">
                                <p>{{ $footer->address }}</p>
                                <a href="{{ $footer->email }}" class="mail">{{ $footer->email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">Follow me</h5>
                                <h4 class="title">socially connect</h4>
                            </div>
                            <div class="footer__widget__social">
                                <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                                <ul class="footer__social__list">
                                    <li><a href="{{ $footer->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $footer->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $footer->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $footer->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright__text text-center">
                                <p>{{ $footer->copyright }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer-area-end -->
        
		<!-- JS here -->
        <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('frontend/js/element-in-view.js')}}"></script>
        <script src="{{ asset('frontend/js/slick.min.js')}}"></script>
        <script src="{{ asset('frontend/js/ajax-form.js')}}"></script>
        <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{ asset('frontend/js/plugins.js')}}"></script>
        <script src="{{ asset('frontend/js/main.js')}}"></script>
    </body>
</html>