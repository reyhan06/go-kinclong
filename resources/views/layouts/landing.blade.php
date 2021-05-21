<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/ico/iconweb.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing/css/vendor/Pe-icon-7-stroke.css') }}" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/magnific-popup.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing/css/plugins/ion.rangeSlider.min.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

</head>

<body>
    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <!-- Begin Main Header Area -->
        <header class="main-header-area">
            <div class="header-middle header-sticky py-6 py-lg-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap position-relative">

                                <a href="{{ route('landing.home') }}" class="header-logo">
                                    <img src="{{ asset('landing/images/fix/logofix2.png') }}" alt="Header Logo">
                                </a>

                                <div class="main-menu d-none d-lg-block">
                                    <nav class="main-nav">
                                        <ul>
                                            <li><a href="{{ route('landing.home') }}">Home</a></li>
                                            <li><a href="{{ route('landing.services.index') }}">Wash Services</a></li>
                                            <li><a href="{{ route('landing.about') }}">About Us</a></li>
                                            <li><a href="{{ route('landing.contact') }}">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        <li class="d-lg-block">
                                            <a class="btn btn-primary" href="{{ route('books.create') }}">Book Now</a>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-body">
                    <div class="inner-body">
                        <div class="offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li>
                                        <a href="{{ route('landing.home') }}">
                                            <span class="mm-text">Home</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('landing.services.index') }}">
                                            <span class="mm-text">Wash Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('landing.about') }}">
                                            <span class="mm-text">About Us</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('landing.contact') }}">
                                            <span class="mm-text">Contact Us</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-search">
                                <span class="searchbox-info">---</span>
                                <form action="#" class="hm-searchbox">
                                    <input type="text" name="Search entire store here..." value="Search entire store here..." onblur="if(this.value==''){this.value='Search entire store here...'}" onfocus="if(this.value=='Search entire store here...'){this.value=''}">
                                    <button class="search-btn" type="submit" aria-label="searchbtn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Header Area End Here -->

        @yield('content')

        <!-- Begin Footer Area -->
        <div class="footer-area">
            <div class="footer-top section-space-y-axis-100 text-lavender" data-bg-image="{{ asset('landing/images/background-img/1-4-1920x419.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget-item">
                                <div class="footer-logo">
                                    <a href="{{ route('landing.home') }}">
                                        <img src="{{ asset('landing/images/fix/logo putih.png') }}" alt="Logo">
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 pt-8 pt-lg-0"></div>
                    <div class="col-lg-5 pt-8 pt-lg-0">
                        <div class="widget-item">
                            <h3 class="widget-title mb-5">Store Information.</h3>
                        </div>
                        <div class="widget-contact-info pb-2">
                            <ul>
                                <li>
                                    Jl. Mergan Raya No.5, Malang, Jawa Timur, Indonesia
                                </li>
                                <li>
                                    <a href="mailto://info@example.com">gokinclong00@gmail.com
                                    </a>
                                </li>
                                <li>
                                    <a href="tel://+68-120034509">0895614039386</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-midnight-express py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                            <span class="copyright-text">© 2021 Go-Kinclong | Sistem Pemesanan Layanan Cuci Mobil dan Motor <i class="fa fa-heart text-danger"></i> by Group G
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->
    </div>

    <!-- Begin Scroll To Top -->
    <a class="scroll-to-top" href="">
        <i class="fa fa-chevron-up"></i>
    </a>
    <!-- Scroll To Top End Here -->

    </div>

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files
    ============================================ -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
    <script src="{{ asset('landing/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!--Plugins JS-->
    <script src="{{ asset('landing/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/parallax.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/tippy.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('landing/js/plugins/mailchimp-ajax.js') }}"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>
