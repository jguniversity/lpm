@extends('layouts.master-landing-page')
@section('title', 'Lembaga Penjaminan Mutu Jakarta Global University')


@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
<style>
    .page-wrapper.compact-wrapper .nav-right .nav-menus {
        margin-right: 0px;
    }

    .dropdown-basic .dropdown .dropdown-content a {
        padding: 16px 16px;
    }

    .landing-home .content {
        text-align: left;
        margin-left: 20px;
    }

</style>
@endsection
@section('content')
<div class="landing-home">
    <ul class="decoration">
        <li class="one"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/1.png') }}" alt="">
        </li>
        <li class="two"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/2.png') }}" alt="">
        </li>
        <li class="three"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/4.png') }}" alt="">
        </li>
        <li class="four"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/3.png') }}" alt="">
        </li>
        <li class="five"><img class="img-fluid" src="{{ asset('assets/images/landing/2.png') }}" alt=""></li>
        <li class="six"><img class="img-fluid" src="{{ asset('assets/images/landing/decore/cloud.png') }}" alt=""></li>
        <li class="seven"><img class="img-fluid" src="{{ asset('assets/images/landing/2.png') }}" alt="">
        </li>
    </ul>
    <div class="container-fluid">
        <!-- EDIT HOME MULAI DARI SINI -->

        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="content ">
                    <div class="container">
                        <h1 class="wow fadeIn">Lembaga </h1>
                        <h1 class="wow fadeIn">Penjaminan Mutu (LPM)</h1>
                        <h2 class="txt-secondary wow fadeIn">Quality Assurance & Control</h2>
                        <p class="mt-3 wow fadeIn">Jakarta Global University
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-7 col-lg-6">
                <div class="wow fadeIn"><img class="screen2" style="margin-top: 10vh;"
                        src="{{ asset('assets/images/landing/screen2.jpg') }}" alt=""></div>
            </div>
        </div>
        <!-- BATAS AKHIR HALAMAN HOME PALING ATAS -->
    </div>
</div>
<!-- ABOUT US -->
<section class="section-space cuba-demo-section layout" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content">
                    <div class="couting">
                        <h2>Tentang</h2>
                        <div class="media-body mt-3 mb-3"><i>
                                LPM adalah singkatan dari Lembaga Penjaminan Mutu, sebuah unit kerja di JGU yang
                                bertugas untuk memastikan dan meningkatkan kualitas pendidikan.
                                LPM bekerja dengan merencanakan, melaksanakan, memonitor, mengevaluasi, dan
                                mengembangkan sistem penjaminan mutu internal (SPMI) dan eksternal (SPME) di
                                kampus,
                                serta melakukan audit mutu untuk mencapai standar pendidikan tinggi yang
                                ditetapkan.
                            </i>
                        </div>
                    </div>
                    <div class="media-body text-center">
                        <p>Tujuan</p>
                        <div class="media">
                            <div class="activity-dot-primary mx-2 d-none d-lg-block"></div>
                            Terwujudnya sistem penjaminan mutu internal di lingkungan JGU yang meliputi
                            penetapan standar, pelaksanaan, evaluasi, peningkatan, dan pengendalian standar.
                        </div>
                        </br>
                        <div class="media">
                            <div class="activity-dot-primary mx-2 d-none d-lg-block"></div>
                            Menjamin terlaksananya pelayanan dan pelatihan penjaminan mutu internal dan
                            eksternal pada semua unit di lingkungan JGU.
                        </div>
                        </br>
                        <div class="media">
                            <div class="activity-dot-primary mx-2 d-none d-lg-block"></div>
                            Terbentuknya budaya mutu bagi civitas akademika dan tenaga kependidikan di
                            lingkungan JGU.
                        </div>
                        </br>
                        <div class="media">
                            <div class="activity-dot-primary mx-2 d-none d-lg-block"></div>
                            Mempermudah akses data perguruan tinggi yang terintegrasi bagi semua unit di
                            lingkungan JGU.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space bg-Widget pb-0 bg-primary pb-5" id="vision-and-mission">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content mt50">
                    <div class="couting text-secondary">
                        <h2>Visi & Misi</h2>
                    </div>
                </div>
                <div class="media-body"></div>
                <h3>Visi</h3>
                <div class="card-body new-update pt-0">
                    <div class="activity-timeline">
                        <div class="media">
                            <div class="media-body"><i>Menjadikan Lembaga Penjaminan Mutu JGU sebagai pelopor
                                    dalam menerapkan sistem dan budaya mutu tridharma perguruan tinggi yang
                                    dapat mengantarkan JGU menjadi institusi unggul dalam bidang teknologi dan
                                    Kesehatan.
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-left">
                <h3>Misi</h3>
                <div class="media">
                    <div class="activity-dot-dark mx-2 d-none d-lg-block"></div>
                    <div class="media"><span>Menyusun, menerapkan, dan melakukan perbaikan secara
                            berkelanjutan terhadap Sistem Penjaminan Mutu Internal (SPMI).</span>
                    </div>
                </div>
                <div class="media">
                    <div class="activity-dot-dark mx-2 d-none d-lg-block"></div>
                    <div class="media"><span>Membangun dan mengembangkan pelayanan dan pelatihan sistem
                            penjaminan mutu internal dan eksternal pada semua unit di lingkungan JGU.
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="activity-dot-dark mx-2 d-none d-lg-block"></div>
                    <div class="media"><span>Mendorong terbentuknya budaya mutu tridharma perguruan tinggi
                            bagi civitas akademika dan tenaga kependidikan di lingkungan JGU.</span>
                    </div>
                </div>
                <div class="media">
                    <div class="activity-dot-dark mx-2 d-none d-lg-block"></div>
                    <div class="media"><span>Membangun pangkalan data perguruan tinggi JGU yang
                            terintegrasi untuk semua unit di lingkungan JGU.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space cuba-demo-section email_bg" id="org-structure">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow pulse">
                <div class="cuba-demo-content email-txt text-start">
                    <div class="couting">
                        <h2>Struktur</h2>
                        <p>Organisasi LPM</p>
                        <ul class="landing-ul">
                            <li>Rektor</li>
                            <li>Kepala Lembaga</li>
                            <li>Ketua Bidang Penjamin Mutu Internal</li>
                            <li>Ketua Bidang Pengembangan Dan Dokumentasi Mutu</li>
                            <li>Ketua Bidang Penjamin Mutu Eksternal</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow pulse text-center">
                <a href="{{ asset('assets/images/dashboard/struktur.png') }}" target="_blank">
                    <img class="img-fluid" src="{{ asset('assets/images/dashboard/struktur.png') }}">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="footer-bg" id="instruments">
    <div class="container">
        <div class="landing-center ptb50">
            <div class="title">
                <h2>Sistem Penjaminan Mutu Internal</h2>
                <h3>(SPMI)</h3>
            </div>
            <div class="footer-content">
                <h6>Bagi Perguruan Tinggi/Ketua Program Studi yang ingin mengunduh<br>Sistem Penjaminan Mutu
                    Internal (SPMI)<br>Jakarta Global University</h6>
                <h6>silahkan klik tautan berikut :</h6>
                @foreach($LINKINSTRUMENT as $index => $i)

                <a class="btn mrl5 btn-pill btn-outline-secondary mb-2 default-view" target="_blank"
                    href="{{ $i->content }}">{{ $i->title }}</a>


                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section-space cuba-demo-section components-section" id="results">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content mt50">
                    <div class="couting">
                        <h2>Hasil</h2>
                    </div>
                    <p>Akreditasi Program Studi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container container-modify">
        <div class="row component_responsive justify-content-md-center">
            @foreach($study_program as $index => $sp)
            <div class="col-xl-2 col-md-4 col-6 component-col-set">
                <a href="{{$sp->certificate}}" title="Klik untuk melihat sertifikat" target="_blank">
                    <div class="component-hover-effect">
                        @for($i = 1; $i <= $sp->acreditation->star_point; $i++)
                            <i class="fa fa-spin fa-star h2 text-warning"></i>
                            @endfor
                            @for($i = 1; $i <= (3-$sp->acreditation->star_point); $i++)
                                <i class="fa fa-spin fa-star-o  h2 text-warning"></i>
                                @endfor
                                <h6 class="m-0">{{$sp->acreditation->name}}</h6>
                                <p>{{$sp->degree_level}} {{$sp->name}}</p>
                    </div>
                </a>
            </div>
            @endforeach
            <a target="_blank" class="text-warning" href="{{ route('akreditasi') }}#results">Klik disini untuk
                download Sertifikat Akreditasi</a>
        </div>
    </div>
</section>

<section class="section-space cuba-demo-section components-section bg-light" id="survey">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content">
                    <div class="couting text-secondary">
                        <h2>Survei Layanan</h2>
                    </div>
                </div>
                <div class="card-body new-update pt-0">
                    <div class="activity-timeline">
                        <div class="media">
                            <div class="media-body text-dark">
                                <i>
                                    Survei layanan merupakan metode pengumpulan data untuk mengevaluasi
                                    pengalaman dan kepuasan pengguna terhadap suatu layanan,
                                    sekaligus mengidentifikasi kekuatan dan area yang perlu diperbaiki.
                                    LPM JGU melaksanakan survei ini secara rutin untuk menilai kepuasan civitas
                                    akademika terhadap layanan akademik maupun non-akademik.
                                </i>
                            </div>
                        </div>
                    </div>
                    @if($LINKSURVEY != null || $LINKSURVEY != "")
                    <a class="btn mrl5 btn-lg btn-primary default-view mt-3" target="_blank"
                        href="{{ $LINKSURVEY->content }}">{{ $LINKSURVEY->title }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space cuba-demo-section components-section bg-dark" id="news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content">
                    <div class="couting text-secondary">
                        <h2>Berita</h2>
                    </div>
                </div>
                <div class="card-body new-update pt-0">

                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            @forelse($posts as $post)
                            <div class="col-md-6 col-xxl-3 box-col-6">
                                <div class="card">
                                    <div class="blog-box blog-grid text-center">

                                        <a href="{{ route('news.show', $post->slug) }}">
                                            @php
                                                $thumbnail = $post->thumbnail
                                                    ? asset('storage/' . $post->thumbnail)
                                                    : null;

                                                if (!$thumbnail && !empty($post->content)) {
                                                    preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $post->content, $matches);

                                                    if (!empty($matches[1])) {
                                                        $thumbnail = $matches[1];
                                                    }
                                                }

                                                $thumbnail = $thumbnail ?: asset('assets/images/landing/screen2.jpg');
                                            @endphp
                                            <img class="img-fluid top-radius-blog"
                                            src="{{ $thumbnail }}"
                                            alt="{{ $post->title }}"
                                            loading="lazy"
                                            style="width: 100%; height: 200px; object-fit: cover;">
                                        </a>

                                        <div class="blog-details-main">
                                            <ul class="blog-social my-1">
                                                <li>
                                                    <i class="fa fa-calendar"></i>
                                                    {{ $post->published_at->format('d F Y') }}
                                                </li>
                                            </ul>

                                            <hr class="m-0">

                                            <a href="{{ route('news.show', $post->slug) }}">
                                                <h5 class="blog-bottom-details text-secondary">
                                                    {{ $post->title }}
                                                </h5>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center">
                                <p class="text-muted">Belum ada berita yang dipublikasikan.</p>
                            </div>
                            @endforelse
                        </div>

                        <a class="btn mrl5 btn-pill btn-outline-secondary default-view mt-3"
                            href="{{ route('news.index') }}">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space email_bg" id="publication">
    <div class="container container-modify">
        <div class="row">
            <div class="col-lg-5 wow pulse">
                <div class="cuba-demo-content email-txt text-start">
                    <div class="couting">
                        <h2>Dokumen Publikasi</h2>
                        <i>Lembaga Penjaminan Mutu (LPM) Jakarta Global University berkomitmen menghadirkan
                            transparansi dan peningkatan mutu berkelanjutan. Melalui laman ini, kami menyediakan
                            hasil survei kepuasan, laporan Audit Mutu Internal (AMI), serta dokumen mutu dan
                            pedoman lainnya yang menjadi acuan seluruh unit kerja.<br><br>
                            Publikasi ini diharapkan dapat menjadi sumber informasi yang akurat bagi sivitas
                            akademika sekaligus mendorong terciptanya budaya mutu di lingkungan universitas.</i>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <table class="table table-hover table-sm" id="datatablex" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" width="20px">No</th>
                            <th scope="col">Publikasi</th>
                            <th scope="col" width="150px">Tahun Terbit</th>
                            <th scope="col" width="150px">Dokumen</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<footer class="section-space cuba-demo-section  pb-0 bg-secondary" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow pulse">
                <div class="cuba-demo-content mt50">
                    <div class="couting">
                        <h2>Kontak</h2>
                    </div>
                    <div class="footer_bottom-item footer_social-media penci-col-3">
                        <div class="block-title mb-4"><br><span>Butuh bantuan LPM JGU?
                                <br>Silahkan hubungi {{ $CONTACT->title }} : {{ $CONTACT->content }}</span>
                        </div>
                        <a class="social-media-item socail_media_facebook mx-3" target="_blank"
                            href="https://www.facebook.com/jakartaglobaluniversity" title="Facebook"
                            rel="noopener"><span class="socail-media-itemcontent"><i class="fa fa-facebook"></i><span
                                    class="social_title screen-reader-text">
                                    Facebook</span></span></a>
                        <a class="social-media-item socail_mediainstagram mx-3" target="_blank"
                            href="https://www.instagram.com/jg_university/" title="Instagram" rel="noopener"><span
                                class="socail-media-itemcontent"><i class="fa fa-instagram"></i><span
                                    class="social_title screen-reader-text">
                                    Instagram</span></span>
                        </a>
                        <a class="social-media-item socail_mediayoutube mx-3" target="_blank"
                            href="https://www.youtube.com/channel/UCoU56BRZyVCaDJiSI2TpR0g" title="Youtube"
                            rel="noopener"><span class="socail-media-itemcontent"><i
                                    class="fa fa-youtube-play"></i><span class="social_title screen-reader-text">
                                    Youtube</span></span>
                        </a>
                        <a class="social-media-item socail_mediatwitter mx-3" target="_blank"
                            href="https://twitter.com/jg_university" title="Twitter" rel="noopener"><span
                                class="socail-media-itemcontent"><i class="fa fa-twitter"></i><span
                                    class="social_title screen-reader-text"> Twitter</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 wow pulse footer-inner" style="text-align: justify;">
                <h3><i><b>Mengubah Hidup,</b><br>
                        <b>Memperkaya Masa Depan!</b><br><br></i></h3>
                <img class="img-fluid" src="{{ asset('assets/images/logo-white.png') }}" alt="JGU"
                    width="230px"><br><br>
                <b>Kampus Jakarta Global University</b>
                <br>
                Grand Depok City, Jl. Boulevard Raya No.2 Kota Depok<br>
                16412, Jawa Barat Indonesia
                <br>Telp. (+62) 21-7781-7710
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class="col-sm-12 col-lg-6 mb-3">
                <iframe
                    src="https://maps.google.com/maps?q=Jakarta%20Global%20University%2C%20Jalan%20Boulevard%20Grand%20Depok%20City%2C%20Tirtajaya%2C%20Depok%20City%2C%20West%20Java%2C%20Indonesia&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    width="100%" height="350px" frameborder="0">
                </iframe>
            </div>
        </div>
    </div>
</footer>
@endsection
@section('script')
@if (Route::current()->getName() != 'popover')
<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/script2.js') }}"></script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatablex').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ordering: false,
            language: {
                searchPlaceholder: 'Cari dokumen...',
                sSearch: '_INPUT_ &nbsp;',
                lengthMenu: '<span>Show:</span> _MENU_',
            },
            lengthMenu: [
                [5, 10, 100],
                [5, 10, 100],
            ],
            ajax: {
                url: "{{ route('api.publication') }}",
                data: function (d) {
                    d.search = $('input[type="search"]').val()
                },
            },
            columns: [{
                    render: function (data, type, row, meta) {
                        var no = (meta.row + meta.settings._iDisplayStart + 1);
                        return no;
                    },
                    orderable: false,
                    className: "text-center"
                },
                {
                    render: function (data, type, row, meta) {
                        var x = row.title;
                        return x;
                    },
                    className: "dt-left"
                },

                {
                    render: function (data, type, row, meta) {
                        if (row.year != null) {
                            var x = '<code title="diterbitkan pada ' + row.year +
                                '">' + row.year + '</code>';
                        } else {
                            var x = "";
                        }
                        return x;
                    },
                    className: "text-center"
                },
                {
                    render: function (data, type, row, meta) {
                        if (row.doc_link != null) {
                            var x = '<a href="' + row.doc_link +
                                '" target="_blank"><span class="badge rounded-pill badge-success">Lihat</span></a>';
                        } else {
                            var x =
                                '<span class="badge rounded-pill badge-light">not found</span>';
                        }
                        return x;
                    },
                    className: "text-center"
                }
            ]
        });
    });

</script>
@endsection
</body>

</html>
