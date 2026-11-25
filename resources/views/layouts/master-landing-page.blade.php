<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lembaga Penjaminan Mutu Universitas Global Jakarta">
    <meta name="keywords" content="LPM JGU">
    <meta name="author" content="itic">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    @include('layouts.css')
    @yield('style')
</head>

<body class="landing-page">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper landing-page">
        <div class="">
            <div class="sticky-header">
                <header>
                    <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding container-fluid px-md-5 pt-3"
                        id="sidebar-menu">
                        <a class="navbar-brand p-0" href="{{ route('index') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo-white.png') }}" alt="JGU"
                                style="max-height: 60px"></a>
                        <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                            aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                        <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                            <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                                <li class="nav-item"><a class="nav-link px-3" href="#"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-ui-home"></i> Beranda</a></li>
                                <li class="nav-item">
                                    <div class=" dropup dropdown-basic">
                                        <div class="dropup dropdown">
                                            <a class="nav-link px-3" href="#"
                                                style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                                <i class="icofont icofont-ui-user"></i> Tentang</a>
                                            <div class="dropup-content dropdown-content">
                                                <a href="#about-us">Tentang</a>
                                                <a href="#vision-and-mission">Visi & Misi</a>
                                                <a href="#org-structure">Struktur Org.</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class=" dropup dropdown-basic">
                                        <div class="dropup dropdown">
                                            <a class="nav-link px-3" href="#"
                                                style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                                <i class="icofont icofont-trophy"></i>
                                                Akreditasi</a>
                                            <div class="dropup-content dropdown-content">
                                                <a href="#instruments">SPMI</a>
                                                <a href="#results">Hasil</a>
                                                <a href="{{ route('target-renstra') }}#results">Target Renstra</a>
                                                <a href="{{ route('rencana-pengembangan') }}">Rencana
                                                    Pengembangan</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link px-3" href="#survey"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-paperclip"></i> Survei</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#news"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-newspaper"></i> Berita</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#publication"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-archive"></i> Publikasi</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="#contact"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-ui-head-phone"></i> Kontak</a></li>
                                <li class="nav-item">
                                    <div class="dropup dropdown-basic">
                                        <div class="dropup dropdown">
                                            <a class="nav-link dropbtn btn-primary px-3" href="#"><i
                                                    class="fa fa-th"></i> Aplikasi</a>
                                            <div class="dropup-content dropdown-content">
                                                @if (Route::has('login'))
                                                @auth
                                                <a href="{{ url('/dashboard') }}"
                                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Peer
                                                    Observation</a>
                                                @else
                                                <a href="{{ route('login') }}"
                                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Peer
                                                    Observation</a>
                                                @endauth
                                                @endif
                                                <a href="https://siap.jgu.ac.id/" target="_blank">Smart Integrated
                                                    Academic Portal</a>
                                                <a href="https://edlink.id/login" target="_blank">Edlink</a>
                                                <a href="https://cbt.jgu.ac.id/" target="_blank">Computer Based
                                                    Test</a>
                                                <a href="https://apps.jgu.ac.id/" target="_blank">JGU APPS</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    </div>
    <div class="page-wrapper landing-page">
        <!-- Container-fluid starts-->
        @yield('content')
        <!-- Container-fluid Ends-->

        <footer class="section-space bg-secondary py-1">
            <hr>
            Copyright © {{ (date('Y')=="2022"?date('Y'):"2022-".date('Y')) }} made with ❤️ by <a
                href="https://itic.jgu.ac.id">ITIC JGU</a>.<br><small
                class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                v{{ Illuminate\Foundation\Application::VERSION }}p{{ PHP_VERSION }} - All rights reserved.</small>
        </footer>
    </div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    @yield('script')
</body>

</html>
