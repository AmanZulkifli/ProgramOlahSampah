<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://builder.bootstrapmade.com/static/vendors/bootstrap/css/bootstrap.css?v=13">
    <link id="builder-font-poppins"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <title>RecyclePro♻️</title>

    <style id="builder-general-css">
        :root {
            --default-font: Poppins, Roboto, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, Liberation Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            --heading-font: Raleway;
            --nav-font: Poppins;
            --background-color: #ffffff;
            --default-color: #444444;
            --heading-color: #040677;
            --accent-color: #1acc8d;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
            --nav-color: #ffffff;
            --nav-hover-color: #1acc8d;
            --nav-mobile-background-color: #ffffff;
            --nav-dropdown-background-color: #ffffff;
            --nav-dropdown-color: #444444;
            --nav-dropdown-hover-color: #1acc8d;
            scroll-behavior: smooth;
        }

        body {
            color: var(--default-color);
            background-color: var(--background-color);
            font-family: var(--default-font);
        }

        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            color: color-mix(in srgb, var(--accent-color), transparent 25%);
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--heading-color);
            font-family: var(--heading-font);
        }

        section,
        .section {
            color: var(--default-color);
            background-color: var(--background-color);
            padding: 60px 0;
            scroll-margin-top: 100px;
            overflow: clip;
        }

        @media (max-width: 1199px) {

            section,
            .section {
                scroll-margin-top: 66px;
            }
        }

        .section-title {
            padding-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 14px;
            font-weight: 500;
            padding: 0;
            line-height: 1px;
            margin: 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--default-color), transparent 50%);
            position: relative;
        }

        .section-title h2::after {
            content: "";

            height: 1px;
            display: inline-block;
            background: var(--accent-color);
            margin: 4px 10px;
        }

        .section-title div {
            color: var(--heading-color);
            margin: 0;
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            font-family: var(--heading-font);
        }

        .page-title {
            color: var(--default-color);
            background-color: var(--background-color);
            position: relative;
        }

        .page-title .heading {
            padding: 160px 0 80px 0;
            border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
        }

        .page-title .heading h1 {
            font-size: 38px;
            font-weight: 700;
        }

        .page-title nav {
            background-color: color-mix(in srgb, var(--default-color), transparent 88%);
            padding: 20px 0;
        }

        .page-title nav ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .judul {
            font-family: poppins;
        }
        .page-title nav ol li+li {
            padding-left: 10px;
        }

        .page-title nav ol li+li::before {
            content: "/";
            display: inline-block;
            padding-right: 10px;
            color: color-mix(in srgb, var(--default-color), transparent 70%);
        }

        .widgets-container {
            background-color: var(--surface-color);

            margin: 60px 0 30px 0;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .widget-title {
            color: var(--heading-color);
            font-size: 20px;
            font-weight: 700;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .widget-item {
            margin-bottom: 40px;
        }

        .widget-item:last-child {
            margin-bottom: 0;
        }
    </style>
    <style id="builder-color-presets-css">
        [data-colorpreset="cp-light-background"],
        .light-background {
            --background-color: #f4f5fe;
            --surface-color: #ffffff;
        }

        [data-colorpreset="cp-dark-background"],
        .dark-background {
            --background-color: #08005e;
            --default-color: #ffffff;
            --heading-color: #ffffff;
            --surface-color: #0c0091;
            --contrast-color: #ffffff;
        }
    </style>
    <style id="header-style">
        .header {
            color: var(--default-color);
            background-color: #08005e;
            padding: 20px 0;
            transition: all 0.5s;
            z-index: 997;
        }

        * {
            font-family: Poppins;
        }
        .header .logo {
            line-height: 1;
        }

        .header .logo img {
            max-height: 32px;
            margin-right: 8px;
        }

        .header .logo h1 {
            font-size: 30px;
            margin: 0;
            font-weight: 700;
            color: var(--heading-color);
        }

        .scrolled .header {
            box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
        }
    </style>
    <style id="header-colors">
        .header {
            --background-color: rgba(255, 255, 255, 0);
            --default-color: #ffffff;
            --heading-color: #ffffff;
            --nav-color: #ffffff;
            --nav-hover-color: #1acc8d;
            --nav-mobile-background-color: #ffffff;
            --nav-dropdown-background-color: #ffffff;
            --nav-dropdown-color: #444444;
            --nav-dropdown-hover-color: #1acc8d;
        }

        .scrolled .header {
            --background-color: #10058c;
        }
    </style>
    <style id="nav-style">
        /* Navmenu - Desktop */
        @media (min-width: 1200px) {
            .navmenu {
                padding: 0;
            }

            .navmenu ul {
                margin: 0;
                padding: 0;
                display: flex;
                list-style: none;
                align-items: center;
            }

            .navmenu li {
                position: relative;
            }

            .navmenu a,
            .navmenu a:focus {
                color: var(--nav-color);
                padding: 18px 15px;
                font-size: 16px;
                font-family: var(--nav-font);
                font-weight: 400;
                display: flex;
                align-items: center;
                justify-content: space-between;
                white-space: nowrap;
                transition: 0.3s;
            }

            .navmenu a i,
            .navmenu a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;
                transition: 0.3s;
            }

            .navmenu li:last-child a {
                padding-right: 0;
            }

            .navmenu li:hover>a,
            .navmenu .active,
            .navmenu .active:focus {
                color: var(--nav-hover-color);
            }

            .navmenu .dropdown ul {
                margin: 0;
                padding: 10px 0;
                background: var(--nav-dropdown-background-color);
                display: block;
                position: absolute;
                visibility: hidden;
                left: 14px;
                top: 130%;
                opacity: 0;
                transition: 0.3s;
                border-radius: 4px;
                z-index: 99;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            }

            .navmenu .dropdown ul li {
                min-
            }

            .navmenu .dropdown ul a {
                padding: 10px 20px;
                font-size: 15px;
                text-transform: none;
                color: var(--nav-dropdown-color);
            }

            .navmenu .dropdown ul a i {
                font-size: 12px;
            }

            .navmenu .dropdown ul a:hover,
            .navmenu .dropdown ul .active:hover,
            .navmenu .dropdown ul li:hover>a {
                color: var(--nav-dropdown-hover-color);
            }

            .navmenu .dropdown:hover>ul {
                opacity: 1;
                top: 100%;
                visibility: visible;
            }

            .navmenu .dropdown .dropdown ul {
                top: 0;
                left: -90%;
                visibility: hidden;
            }

            .navmenu .dropdown .dropdown:hover>ul {
                opacity: 1;
                top: 0;
                left: -100%;
                visibility: visible;
            }
        }

        /* Navmenu - Mobile */
        @media (max-width: 1199px) {
            .mobile-nav-toggle {
                color: var(--nav-color);
                font-size: 28px;
                line-height: 0;
                margin-right: 10px;
                cursor: pointer;
                transition: color 0.3s;
            }

            .navmenu {
                padding: 0;
                z-index: 9997;
            }

            .navmenu ul {
                display: none;
                list-style: none;
                position: absolute;
                inset: 60px 20px 20px 20px;
                padding: 10px 0;
                margin: 0;
                border-radius: 6px;
                background-color: var(--nav-mobile-background-color);
                overflow-y: auto;
                transition: 0.3s;
                z-index: 9998;
                box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
            }

            .navmenu a,
            .navmenu a:focus {
                color: var(--nav-dropdown-color);
                padding: 10px 20px;
                font-family: var(--nav-font);
                font-size: 17px;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: space-between;
                white-space: nowrap;
                transition: 0.3s;
            }

            .navmenu a i,
            .navmenu a:focus i {
                font-size: 12px;
                line-height: 0;
                margin-left: 5px;

                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: 0.3s;
                background-color: color-mix(in srgb, var(--accent-color), transparent 90%);
            }

            .navmenu a i:hover,
            .navmenu a:focus i:hover {
                background-color: var(--accent-color);
                color: var(--contrast-color);
            }

            .navmenu a:hover,
            .navmenu .active,
            .navmenu .active:focus {
                color: var(--nav-dropdown-hover-color);
            }

            .navmenu .active i,
            .navmenu .active:focus i {
                background-color: var(--accent-color);
                color: var(--contrast-color);
                transform: rotate(180deg);
            }

            .navmenu .dropdown ul {
                position: static;
                display: none;
                z-index: 99;
                padding: 10px 0;
                margin: 10px 20px;
                background-color: var(--nav-dropdown-background-color);
                border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
                box-shadow: none;
                transition: all .5s ease-in-out;
            }

            .navmenu .dropdown ul ul {
                background-color: rgba(33, 37, 41, 0.1);
            }

            .navmenu .dropdown>.dropdown-active {
                display: block;
                background-color: rgba(33, 37, 41, 0.03);
            }

            .mobile-nav-active {
                overflow: hidden;
            }

            .mobile-nav-active .mobile-nav-toggle {
                color: #fff;
                position: absolute;
                font-size: 32px;
                top: 15px;
                right: 15px;
                margin-right: 0;
                z-index: 9999;
            }

            .mobile-nav-active .navmenu {
                position: fixed;
                overflow: hidden;
                inset: 0;
                background: rgba(33, 37, 41, 0.8);
                transition: 0.3s;
            }

            .mobile-nav-active .navmenu>ul {
                display: block;
            }
        }

        /* Listing Dropdown - Desktop */
        @media (min-width: 1200px) {
            .navmenu .listing-dropdown {
                position: static;
            }

            .navmenu .listing-dropdown ul {
                margin: 0;

                background: var(--nav-dropdown-background-color);
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
                position: absolute;
                top: 130%;
                left: 0;
                right: 0;
                visibility: hidden;
                opacity: 0;
                display: flex;
                transition: 0.3s;
                border-radius: 4px;
                z-index: 99;
            }

            .navmenu .listing-dropdown ul li {
                flex: 1;
            }

            .navmenu .listing-dropdown ul li a,
            .navmenu .listing-dropdown ul li:hover>a {
                padding: 10px 20px;
                font-size: 15px;
                color: var(--nav-dropdown-color);
                background-color: var(--nav-dropdown-background-color);
            }

            .navmenu .listing-dropdown ul li a:hover,
            .navmenu .listing-dropdown ul li .active,
            .navmenu .listing-dropdown ul li .active:hover {
                color: var(--nav-dropdown-hover-color);
                background-color: var(--nav-dropdown-background-color);
            }

            .navmenu .listing-dropdown:hover>ul {
                opacity: 1;
                top: 100%;
                visibility: visible;
            }
        }

        /* Listing Dropdown - Mobile */
        @media (max-width: 1199px) {
            .navmenu .listing-dropdown ul {
                position: static;
                display: none;
                z-index: 99;
                padding: 10px 0;
                margin: 10px 20px;
                background-color: var(--nav-dropdown-background-color);
                border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
                box-shadow: none;
                transition: all .5s ease-in-out;
            }

            .navmenu .listing-dropdown ul ul {
                background-color: rgba(33, 37, 41, 0.1);
            }

            .navmenu .listing-dropdown>.dropdown-active {
                display: block;
                background-color: rgba(33, 37, 41, 0.03);
            }
        }
    </style>
    <style id="footer-style">
        .footer {
            background-color: var(--background-color);
            color: var(--default-color);
            padding-top: 60px;
            font-size: 14px;
            border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 80%);
        }

        .footer a {
            color: var(--default-color) !important;
        }

        .footer a:hover {
            color: var(--accent-color);
        }

        .footer .copyright {
            margin-top: 50px;
            position: relative;
            padding: 30px 0;
            border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 80%);
        }

        .footer .copyright p,
        .footer .copyright .credits {
            margin: 2px 0;
        }

        .footer .btn-learn-more {
            background-color: var(--accent-color);
            border-radius: 30px;
            padding: 8px 30px;
            border: 2px solid transparent;
            transition: 0.3s all ease-in-out;
            font-size: 14px;
            color: var(--contrast-color) !important;
        }

        .footer .btn-learn-more:hover {
            border-color: var(--accent-color);
            background-color: transparent;
            color: var(--accent-color) !important;
        }

        .footer .widget .widget-heading {
            font-size: 15px;
            color: var(--heading-color);
            margin-bottom: 20px;
        }

        .footer .widget ul li {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .footer .widget ul li a {
            color: color-mix(in srgb, var(--heading-color), transparent 50%);
        }

        .footer .widget ul li a:hover {
            text-decoration: none;
            color: var(--heading-color);
        }

        .footer .widget .footer-blog-entry .date {
            color: color-mix(in srgb, var(--default-color), transparent 50%);
            font-size: 12px;
        }

        .footer .social-icons li {
            display: inline-block;
        }

        .footer .social-icons li a {
            display: inline-block;

            height: 40px;
            position: relative;
            border-radius: 50%;
            background: color-mix(in srgb, var(--default-color), transparent 90%);
        }

        .footer .social-icons li a span {
            color: color-mix(in srgb, var(--heading-color), transparent 0%);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: 0.3s all ease-in-out;
        }

        .footer .social-icons li a:hover {
            background: var(--accent-color);
        }

        .footer .social-icons li a:hover span {
            color: var(--contrast-color);
        }

        .footer .social-icons li:first-child a {
            padding-left: 0;
        }

        .footer .footer-subscribe form {
            position: relative;
        }

        .footer .footer-subscribe .form-control {
            font-size: 14px;
            height: 42px;
            border: 2px solid color-mix(in srgb, var(--default-color), transparent 40%);
            background: none;
            color: var(--heading-color);
            padding-right: 40px;
        }

        .footer .footer-subscribe .form-control:focus {
            border-color: color-mix(in srgb, var(--default-color), transparent 10%);
            box-shadow: none;
        }

        .footer .footer-subscribe .form-control::placeholder {
            color: color-mix(in srgb, var(--heading-color), transparent 60%);
        }

        .footer .footer-subscribe .btn-link {
            padding: 0;
            margin: 0;
            font-size: 1.5rem;
            background-color: none;
            border-color: none;
            position: absolute;
            line-height: 0;
            color: color-mix(in srgb, var(--heading-color), transparent 20%);
            top: 20px;
            right: 10px;
            transform: translateY(-50%) rotate(0deg);
        }

        .footer .footer-subscribe .btn-link:hover,
        .footer .footer-subscribe .btn-link:focus,
        .footer .footer-subscribe .btn-link:active {
            text-decoration: none;
        }
    </style>
    @if (Auth::check())
        <style>
            label {
                color: black;
            }
        </style>
    @else
        <style>
            label {
                color: white;
            }
        </style>
    @endif
    <style id="scrolltop-style">
        .scroll-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 99999;
            background-color: var(--accent-color);

            height: 40px;
            border-radius: 4px;
            transition: all 0.4s;
        }

        .scroll-top i {
            font-size: 24px;
            color: var(--contrast-color);
            line-height: 0;
        }

        .scroll-top:hover {
            background-color: color-mix(in srgb, var(--accent-color), transparent 20%);
            color: var(--contrast-color);
        }

        .scroll-top.active {
            visibility: visible;
            opacity: 1;
        }
    </style>

</head>

@if (Auth::check())

    <body class="bg-gray-200 font-poppins leading-normal tracking-normal" style="width: 100%">
    @else

        <body class="bg-dark font-sans leading-normal tracking-normal" style="width: 100%">
@endif
<!-- Header / Navigation -->
<header id="header" class="header d-flex align-items-center fixed-top" data-builder="header"
    data-js=" scrolled scroll-up-sticky">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">


        @if (Auth::check())
            <a href="{{ route('home') }}" class="logo d-flex align-items-center" spellcheck="false">
                <h1 class="sitename" spellcheck="false" style="font-family: poppins">RecyclePro♻️</h1>
            </a>
            <nav id="navmenu" class="navmenu" data-builder="navmenu" data-js=" mobile-nav-toggle mobile-nav-dropdown">
                <ul>
                    <li><a href="{{ route('home') }}" class="">Home</a></li>
                    <li><a href="{{ route('waste.show') }}" class="">Manage Waste</a></li>
                    <li><a href="{{ route('profile') }}" class="">Profile</a></li>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li><a href="{{ route('admin') }}" class="">Manage Account</a></li>
                        <li><a href="{{ route('manage.requests') }}" class="">Manage Requests</a></li>
                    @elseif (Auth::check() && Auth::user()->role === 'worker')
                        <li><a href="{{ route('manage.requests') }}" class="">Manage Requests</a></li>
                    @endif

                    <li><a href="{{ route('settings') }}" class="">Settings</a></li>
                    <li><a href="{{ route('logout') }}" class="">Log out</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none fa fa-bars"></i>
            </nav>
        @else
            <a href="{{ route('landingpage') }}" class="logo d-flex align-items-center" spellcheck="false">
                <h1 class="sitename" spellcheck="false">RecyclePro♻️</h1>
            </a>
        @endif
    </div>

</header>


<!-- Main Content -->
<main class="container mx-auto mt-8" style="width: 100%">
    @yield('content')
</main>

<!-- Footer -->
@if (Auth::check())
    <footer id="footer" class="footer" data-builder="footer" data-colorpreset="cp-dark-background">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                    <div class="widget">
                        <h3 class="widget-heading" spellcheck="false">About Us</h3>
                        <p class="mb-4" spellcheck="false">
                            RecyclePro is committed to leading the way toward a cleaner, greener future by
                            empowering communities and businesses to manage their waste responsibly. Join us on our
                            mission to make recycling simple and rewarding.
                        </p>
                        <p class="mb-0">
                            <a href="#" class="btn-learn-more">Learn more</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
                    <div class="widget">
                        <h3 class="widget-heading" spellcheck="false">Navigation</h3>
                        <ul class="list-unstyled float-start me-5">
                            <li><a href="#hero">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li spellcheck="false">How It Works</li>
                        </ul>
                        <ul class="list-unstyled float-start">
                            <li><a href="#">Contact Us</a></li>
                            <li></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 pl-lg-5">
                    <div class="widget">
                        <h3 class="widget-heading" spellcheck="false">Connect With Us!</h3>
                        <ul class="list-unstyled social-icons light mb-3">
                            <li>
                                <a href="#"><span><i class="fa-brands fa-x-twitter"></i></span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa-brands fa-facebook"></i></span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa-brands fa-google"></i></span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="widget">
                        <div class="footer-subscribe">
                            <h3 class="widget-heading" spellcheck="false">Subscribe</h3>
                            <form action="forms/newsletter.php" method="post" class="php-email-form">
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Enter your email">

                                    <button type="submit" class="btn btn-link">
                                        <span><i class="fa-solid fa-chevron-right"></i></span>
                                    </button>
                                </div>
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your subscription request has been sent. Thank you!
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">RecyclePro</strong> <span>All Rights
                        Reserved</span></p>

            </div>
        </div>
    </footer>
@endif

<!-- Include JS -->
@stack('script')










<script id="builder-vendors-js"></script>
<script id="js-scrolled" class="components-js">
    (() => {
        /**
         * Apply .scrolled class to the body as the page is scrolled down
         */
        function toggleScrolled() {
            const selectBody = document.querySelector('body');
            const selectHeader = document.querySelector('#header');
            if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains(
                    'sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
            window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
        }

        document.addEventListener('scroll', toggleScrolled);
        window.addEventListener('load', toggleScrolled);
    })();
</script>
<script id="js-scroll-up-sticky" class="components-js">
    (() => {
        /**
         * Scroll up sticky header to headers with .scroll-up-sticky class
         */
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const selectHeader = document.querySelector('#header');
            if (!selectHeader.classList.contains('scroll-up-sticky')) return;

            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
                selectHeader.style.setProperty('position', 'sticky', 'important');
                selectHeader.style.top = `-${header.offsetHeight + 50}px`;
            } else if (scrollTop > selectHeader.offsetHeight) {
                selectHeader.style.setProperty('position', 'sticky', 'important');
                selectHeader.style.top = "0";
            } else {
                selectHeader.style.removeProperty('top');
                selectHeader.style.removeProperty('position');
            }
            lastScrollTop = scrollTop;
        });
    })();
</script>
<script id="js-scroll-top" class="components-js">
    (() => {
        /**
         * Scroll top button
         */
        let scrollTop = document.querySelector('.scroll-top');

        function toggleScrollTop() {
            if (scrollTop) {
                window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
            }
        }
        scrollTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        window.addEventListener('load', toggleScrollTop);
        document.addEventListener('scroll', toggleScrollTop);
    })();
</script>
<script id="js-init-swiper" class="components-js">
    (() => {
        /**
         * Init swiper sliders
         */
        function initSwiper() {
            document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
                let config = JSON.parse(
                    swiperElement.querySelector(".swiper-config").innerHTML.trim()
                );

                if (swiperElement.classList.contains("swiper-tab")) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
        }

        window.addEventListener("load", initSwiper);
    })();
</script>
<script id="js-faq" class="components-js">
    (() => {
        /**
         * Frequently Asked Questions Toggle
         */
        document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
            faqItem.addEventListener('click', () => {
                faqItem.parentNode.classList.toggle('faq-active');
            });
        });
    })();
</script>
<script id="js-purecounter" class="components-js">
    (() => {
        /**
         * Initiate Pure Counter
         */
        new PureCounter();
    })();
</script>
<script id="js-glightbox" class="components-js">
    (() => {
        /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });
    })();
</script>
<script id="js-mobile-nav-toggle" class="components-js">
    (() => {
        /**
         * Mobile nav toggle
         */
        const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

        function mobileNavToogle() {
            document.querySelector('body').classList.toggle('mobile-nav-active');
            mobileNavToggleBtn.classList.toggle('bi-list');
            mobileNavToggleBtn.classList.toggle('bi-x');
        }
        if (mobileNavToggleBtn) {
            mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
        }

        /**
         * Hide mobile nav on same-page/hash links
         */
        document.querySelectorAll('#navmenu a').forEach(navmenu => {
            navmenu.addEventListener('click', () => {
                if (document.querySelector('.mobile-nav-active')) {
                    mobileNavToogle();
                }
            });

        });
    })();
</script>
<script id="js-mobile-nav-dropdown" class="components-js">
    (() => {
        /**
         * Toggle mobile nav dropdowns
         */
        document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
            navmenu.addEventListener('click', function(e) {
                e.preventDefault();
                this.parentNode.classList.toggle('active');
                this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
                e.stopImmediatePropagation();
            });
        });
    })();
</script>
<script id="builder-js"></script>

</body>

</html>
