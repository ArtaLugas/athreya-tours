
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="{{ asset('user/assets/images/athreyafavico.ico') }}">
    <link rel="icon" href="{{ asset('user/assets/images/athreyafavico.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('user/assets/images/athreyafavico.ico') }}" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Surfside Media">
    <meta name="msapplication-TileImage" content="{{ asset('user/assets/images/athreyafavico.ico') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Surfside Media">
    <meta name="keywords" content="Surfside Media">
    <meta name="author" content="Surfside Media">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>@yield('title')</title>

    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('user/assets/css/demo4.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .h-logo {
            max-width: 185px !important;
        }

        .f-logo {
            max-width: 220px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                max-width: 110px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    @stack('css')

</head>

<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }
        span {
            font-size: 16px;
            font-weight: bold;
        }

        .name-usr {
            background: #e87316;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        .site-footer {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
        }

        .site-footer h4 {
            color: #fff;
        }

        .site-footer p {
            color: #ddd;
        }

        .footer-section {
            margin-bottom: 20px;
        }

        .footer-section.about h4::before {
            content: "\f129";
            font-family: FontAwesome;
            margin-right: 10px;
            color: #00bcd4;
        }

        .footer-section p{
            font-size: 14px;
        }

        .footer-section.contact h4::before {
            content: "\f041";
            font-family: FontAwesome;
            margin-right: 10px;
            color: #00bcd4;
        }

        .footer-section.links h4::before {
            content: "\f0c1";
            font-family: FontAwesome;
            margin-right: 10px;
            color: #00bcd4;
        }

        .contact-info i {
            margin-right: 10px;
        }

        .contact-info p {
            font-size: 14px;
        }

        .footer-section.links ul {
            list-style: none;
            padding: 0;
        }

        .footer-section.links ul li {
            margin-bottom: 10px;
        }

        .footer-section.links ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section.links ul li a:hover {
            color: #00bcd4;
        }

        /* Gaya latar belakang transparan */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Gaya modal */
        .modal {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        /* Gaya header modal */
        .modal-header {
            background-color: #007BFF;
            color: #fff;
            border-bottom: 1px solid #007BFF;
            border-radius: 5px 5px 0 0;
            padding: 10px;
        }

        /* Gaya judul modal */
        .modal-title {
            font-weight: 600;
        }

        /* Gaya body modal */
        .modal-body {
            padding: 20px;
        }

        /* Gaya daftar dalam modal */
        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Gaya footer modal */
        .modal-footer {
            background-color: #f7f7f7;
            border-top: 1px solid #ccc;
            border-radius: 0 0 5px 5px;
            padding: 10px;
        }

        /* Gaya tombol tutup modal */
        .close {
            color: #007BFF;
            font-size: 20px;
        }

        /* Gaya tombol tutup modal saat dihover */
        .close:hover {
            color: #0056b3;
        }


        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{ route('homepage') }}">
                                        <img src="{{ asset('user/assets/images/athreyatours.png') }}" style="width: 50px;" class="h-logo img-fluid blur-up lazyload"
                                            alt="logo">
                                        <span class="px-3">  Athreya Tours</span>
                                    </a>
                                </div>

                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div>
                                            </li>
                                            <li><a href="{{ route('homepage') }}" class="nav-link menu-title">Home</a></li>
                                            <li><a href="{{ route('paketwisata') }}" class="nav-link menu-title">Package Tour</a></li>
                                            <li><a href="{{ route('aboutususer') }}" class="nav-link menu-title">About Us</a></li>
                                            <li><a href="{{ route('kontakkami') }}" class="nav-link menu-title">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <div class="search-box theme-bg-color">
                                            <i data-feather="search"></i>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown">
                                        <div class="cart-media name-usr">
                                            @auth
                                                <span>{{ Auth::user()->name }}</span>
                                            @endauth
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                @if(Route::has('login'))
                                                    @auth
                                                        @if (Auth::user()->role==='admin')
                                                            <li>
                                                                <a href="{{ route('admindashboard')}}" class="d-block">Dashboard</a>
                                                            </li>    
                                                        @else
                                                            <li>
                                                                <a href="{{ route('profiluser')}}" class="d-block">Profilku</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('riwayatpesanan') }}" class="d-block">Riwayat Psanan</a>
                                                            </li>      
                                                        @endif
                                                        <li>
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="d-block">Log Out</a>
                                                            <form action="{{ route('logout') }}" id="frmlogout" method="POST">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('login')}}" class="d-block">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('register') }}" class="d-block">Register</a>
                                                        </li>
                                                    @endauth
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-full">
                                <form method="GET" class="search-full" action="http://localhost:8000/search">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" name="q" class="form-control search-type"
                                            placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="demo3.php" class="active">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="user-dashboard.php">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mobile-menu-overlay">
        @yield('content')
    </div>    
    <div id="qvmodal"></div>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section about">
                        <h4>About Us</h4>
                        @if ($aboutUsData && isset($aboutUsData->content))
                            <p class="mt-3">{{ $aboutUsData->content }}</p>
                        @else
                            <p class="mt-3">Data About Us tidak tersedia.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section contact">
                        <h4>Contact Information</h4>
                        <div class="contact-info mt-3">
                            <p><i class="fa fa-map-marker"></i> Lingkungan Kavling No.60, Kel, RT.010/RW.002, Bogorame, Bintoro, Kec. Demak, Kabupaten Demak, Jawa Tengah 59511</p>
                            <p><i class="fa fa-envelope"></i> athreyatours.id@gmail.com</p>
                            <p><i class="fa fa-phone"></i> +62 812-2644-8469</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer-section links">
                        <h4>Quick Links</h4>
                        <ul class="mt-2">
                            <li><a href="{{ route('homepage') }}">Home</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('paketwisata') }}">Package Tour</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('aboutususer') }}">About Us</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('kontakkami') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>

    <script src="{{ asset('user/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('user/assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('user/assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('user/assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/filter.js') }}"></script>
    <script src="{{ asset('user/assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('user/assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('user/assets/js/script.js') }}"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
    @stack('script')
</body>

</html>