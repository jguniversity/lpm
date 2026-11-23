    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper landing-page">
        <div class="">
            <div class="sticky-header">
                <header style="background-color: #fff">
                    <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding container-fluid px-5 pt-3"
                        id="sidebar-menu">
                        <a class="navbar-brand p-0" href="{{ route('index') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo-white.png') }}" alt="JGU"
                                style="max-height: 60px"></a>
                        <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                            aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                        <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                            <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                                <li class="nav-item"><a class="nav-link px-3" href="{{ route('index') }}#"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-ui-home"></i> Beranda</a></li>
                                <li class="nav-item">
                                    <div class=" dropup dropdown-basic">
                                        <div class="dropup dropdown">
                                            <a class="nav-link px-3" href="#"
                                                style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                                <i class="icofont icofont-ui-user"></i> Tentang</a>
                                            <div class="dropup-content dropdown-content">
                                                <a href="{{ route('index') }}#about-us">Tentang</a>
                                                <a href="{{ route('index') }}#vision-and-mission">Visi & Misi</a>
                                                <a href="{{ route('index') }}#org-structure">Struktur Org.</a>
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
                                                <a href="{{ route('index') }}#instruments">SPMI</a>
                                                <a href="{{ route('index') }}#results">Hasil</a>
                                                <a href="{{ route('target-renstra') }}#results">Target Renstra</a>
                                                <a href="{{ route('rencana-pengembangan') }}">Rencana
                                                    Pengembangan</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ route('index') }}#survey"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-paperclip"></i> Survei</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ route('index') }}#news"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-newspaper"></i> Berita</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ route('index') }}#publication"
                                        style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                                        <i class="icofont icofont-archive"></i> Publikasi</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{ route('index') }}#contact"
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