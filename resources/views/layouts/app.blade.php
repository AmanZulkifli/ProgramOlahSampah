<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RecyclePro♻️</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <style>
        .sidebar-wrap {
            width: 60px;
            position: fixed;
            height: 100vh;
            background-color: #040677;
            color: #fff;
            padding: 10px;
            transition: 0.8s;
            z-index: 2;
        }

        .sidebar-wrap:hover {
            width: 280px;
            z-index: 3;
        }

        .sidebar-wrap .nav li span {
            display: hidden; 
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .sidebar-wrap:hover .nav li span {
            opacity: 1;
            display: inline-block;
        }

        .sidebar-wrap strong {
            display: none;
            opacity: 0;
            transition: opacity 2.5s ease-in-out;
        }

        .sidebar-wrap:hover strong {
            display: inline-block;
            opacity: 1;
        }

        .sidebar-wrap .dropdown-wrap::after {
            display: none;
        }

        .sidebar-wrap:hover .nav li .nav-link span {
            display: flex;
        }

        .sidebar-wrap:hover .dropdown-wrap strong {
            display: flex;
        }

        .sidebar-wrap:hover .dropdown-wrap::after {
            display: inline-block;
        }

        .sidebar-wrap:hover .dropdown-wrap {
            justify-content: flex-start;
        }

        .sidebar-wrap .logo-wrap {
            color: #fff;
            font-size: 35px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-wrap .logo-wrap span {
            font-size: 18px;
        }

        .sidebar-wrap .logo-wrap .icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            min-width: 40px;
        }

        .sidebar-wrap .nav {
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            flex-wrap: nowrap;
        }

        .sidebar-wrap .nav::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .sidebar-wrap .nav::-webkit-scrollbar {
            width: 5px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .sidebar-wrap .nav::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #9b9b9b;
        }

        .sidebar-wrap .nav li {
            margin-top: 5px;
        }

        .sidebar-wrap .nav li .nav-link {
            color: #fff;
            padding: 0;
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .sidebar-wrap .nav li .nav-link .icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            min-width: 40px;
        }

        .sidebar-wrap .nav li .nav-link span {
            font-size: 16px;
        }

        .sidebar-wrap .nav li .nav-link.active {
            background-color: #14b99b;
        }

        .sidebar-wrap .nav li .nav-link:hover {
            background-color: #14b99b;
        }

        .sidebar-wrap .dropdown-wrap {
            display: flex;
            align-items: center;
            color: #fff;
            gap: 15px;
            font-size: 16px;
        }

        .sidebar-wrap .dropdown-wrap .icon-wrap {
            min-width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <style id="footer-style">
        .footer {
            background-color: #040677;
            color: #fff;
            padding-top: 60px;
            font-size: 14px;
            border-top: 1px solid color-mix(in srgb, #fff, transparent 80%);
        }

        .footer a {
            color: #fff !important;
            text-decoration: none;
        }

        .footer a:hover {
            color: #1acc8d;
            text-decoration: none;
        }

        .footer .copyright {
            margin-top: 50px;
            position: relative;
            padding: 30px 0;
            border-top: 1px solid color-mix(in srgb, #fff, transparent 80%);
        }

        .footer .copyright p,
        .footer .copyright .credits {
            margin: 2px 0;
        }

        .footer .btn-learn-more {
            background-color: #1acc8d;
            border-radius: 30px;
            padding: 8px 30px;
            border: 2px solid transparent;
            transition: 0.3s all ease-in-out;
            font-size: 14px;
            color: var(--contrast-color) !important;
        }

        .footer .btn-learn-more:hover {
            border-color: #1acc8d;
            background-color: transparent;
            color: #1acc8d !important;
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
            color: color-mix(in srgb, #fff, transparent 50%);
            font-size: 12px;
        }

        .footer .social-icons li {
            display: inline-block;
            margin-right: 20px;
        }

        .footer .social-icons li a {
            display: inline-block;
            height: 40px;
            position: relative;
            border-radius: 50%;
            background: color-mix(in srgb, #fff, transparent 90%);
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
            background: #1acc8d;
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
            border: 2px solid color-mix(in srgb, #fff, transparent 40%);
            background: none;
            color: var(--heading-color);
            padding-right: 40px;
        }

        .footer .footer-subscribe .form-control:focus {
            border-color: color-mix(in srgb, #fff, transparent 10%);
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
</head>

<body>
    <header>
        <div class="header" style="position: fixed; width: 100%; display: flex; justify-content: flex-end; align-items: center; height: 65px; background-color: #040677; z-index: 2;">            <div class="container">
            <form class="d-flex" role="search" action="{{ route(Route::currentRouteName()) }}" method="get" style="justify-content: flex-end">
                <input class="form-control me-2" type="search" name="query" placeholder="@if (Route::currentRouteName() === 'home') Search History @elseif(Route::currentRouteName() === 'waste.show') Search Waste @endif" aria-label="Search" style="width: 30%">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        <div class="d-flex flex-column flex-shrink-0 sidebar-wrap">
            <a href="/" class="text-decoration-none logo-wrap">
                <div class="icon-wrap"><img src="{{ asset('assets/images/logo.png') }}" width="40px" alt="Logo">
                </div> <span>RecyclePro♻️</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page">
                        <div class="icon-wrap">
                            <i class="fas fa-home"></i>
                        </div>
                        <span> Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('waste.show') }}"
                        class="nav-link {{ Route::currentRouteName() == 'waste.show' ? 'active' : '' }}">
                        <div class="icon-wrap">
                            <i class="fa-solid fa-dumpster"></i>
                        </div>
                        <span>Waste Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('exchange') }}"
                        class="nav-link">
                        <div class="icon-wrap">
                            <i class="fa-solid fa-dollar-sign"></i>                        </div>
                        <span>Exchange</span>
                    </a>
                </li>
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('admin') }}"
                            class="nav-link {{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                            <div class="icon-wrap">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span>Manage User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manage.requests') }}"
                            class="nav-link {{ Route::currentRouteName() == 'manage.requests' ? 'active' : '' }}">
                            <div class="icon-wrap">
                                <i class="fa-regular fa-clipboard"></i>
                            </div>
                            <span>Manage Request</span>
                        </a>
                    </li>
                @elseif (Auth::check() && Auth::user()->role === 'worker')
                    <li>
                        <a href="{{ route('manage.requests') }}"
                            class="nav-link {{ Route::currentRouteName() == 'manage.requests' ? 'active' : '' }}">
                            <div class="icon-wrap">
                                <i class="fa-regular fa-clipboard"></i>
                            </div>
                            <span>Manage Request</span>
                        </a>
                    </li>
                @endif
            </ul>
            <hr>
            <div class="dropdown">
                <a href="{{ route('profile') }}" class="text-decoration-none dropdown-toggle  dropdown-wrap"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="icon-wrap">
                        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : 'https://via.placeholder.com/120' }}"
                            alt="" width="32" height="32" class="rounded-circle">
                    </div>
                    <strong>{{ ucfirst(Auth::user()->role) }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

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

    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script>
</body>

</html>
