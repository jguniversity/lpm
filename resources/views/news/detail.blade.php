<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $post->excerpt ?? $post->title }}">
    <meta name="author" content="LPM JGU">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{ $post->title }} - LPM JGU</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    @include('layouts.css')
    @yield('style')
    <style>
        body {
            background: #f8f9fa;
        }

        .news-navbar {
            background: #fff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .08);
        }

        .news-navbar .navbar-brand img {
            max-height: 55px;
        }

        .news-header {
            background: #fff;
            padding: 45px 0;
            border-bottom: 1px solid #eee;
        }

        .news-breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .news-title {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.4;
            color: #333;
        }

        .news-meta {
            color: #888;
            font-size: 14px;
            margin-top: 15px;
        }

        .news-main {
            padding: 45px 0;
        }

        .news-card {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .04);
        }

        .news-thumbnail {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .post-content {
            font-size: 16px;
            line-height: 1.9;
            color: #444;
            overflow-wrap: anywhere;
        }

        .post-content img {
            max-width: 100% !important;
            height: auto !important;
            display: block;
            margin: 20px auto;
        }

        .post-content iframe {
            max-width: 100%;
        }

        .post-content table {
            max-width: 100%;
            display: block;
            overflow-x: auto;
        }

        .news-sidebar {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .04);
        }

        .sidebar-news {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .sidebar-news img {
            width: 85px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
        }

        .sidebar-news h6 {
            color: #444;
            line-height: 1.5;
        }

        .gallery-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
        }

        .related-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .page-wrapper.compact-wrapper .nav-right .nav-menus {
            margin-right: 0px;
        }

        .dropdown-basic .dropdown .dropdown-content a {
            padding: 16px 16px;
        }

        @media(max-width:767px) {
            .news-title {
                font-size: 24px;
            }

            .news-card {
                padding: 18px;
            }
        }

    </style>
</head>

<body>
    @include('layouts.master-nav-menu')

    <div class="page-wrapper mt-5 pt-4" style="min-height: 95vh">
        <!-- JUDUL BERITA -->
        <section class=" pt-5">
            <div class="container">
                <div class="news-breadcrumb mb-0">
                    <a href="{{ route('index') }}#news"><i class="icofont icofont-ui-home"></i></a>
                    <i class="fa fa-angle-right mx-2"></i>
                    <a href="{{ route('news.index') }}">Berita</a>
                    <i class="fa fa-angle-right mx-2"></i>
                    <span class="text-muted">{{ $post->title }}</span>
                </div>
            </div>
        </section>


        <!-- KONTEN BERITA -->
        <section class="news-main pt-4">
            <div class="container">
                <div class="row">

                    <!-- ARTIKEL UTAMA -->
                    <div class="col-lg-8 mb-4">

                        <article class="news-card">

                            @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="news-thumbnail"
                                alt="{{ $post->title }}">
                            @endif

                            <h1 class="news-title">
                                {{ $post->title }}
                            </h1>

                            <div class="news-meta">
                                <span>
                                    <i class="fa fa-calendar"></i>
                                    {{ $post->published_at->translatedFormat('d F Y') }}
                                </span>

                                <span class="mx-3">
                                    <i class="fa fa-folder"></i>
                                    {{ $post->category->name ?? 'Berita' }}
                                </span>

                                <span>
                                    <i class="fa fa-eye"></i>
                                    {{ number_format($post->views, 0, ',', '.') }} kali dibaca
                                </span>

                                <span class="mx-3">
                                    <i class="fa fa-user"></i>
                                    {{ $post->author->name ?? 'LPM JGU' }}
                                </span>
                            </div>
                            <hr>
                            @if($post->excerpt)
                            <div class="mb-4">
                                <p class="text-muted">
                                    <strong>{{ $post->excerpt }}</strong>
                                </p>
                            </div>
                            @endif

                            <div class="post-content">
                                {!! $post->content !!}
                            </div>

                            <!-- PHOTO GALLERY -->
                            @if($post->images->count())
                            <hr class="my-4">

                            <h4 class="mb-4">Galeri Foto</h4>

                            <div class="row">
                                @foreach($post->images as $image)
                                <div class="col-md-4 col-6 mb-3">
                                    <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="gallery-image"
                                            alt="{{ $image->caption ?? $post->title }}">
                                    </a>
                                    @if($image->caption)
                                    <small class="text-muted">
                                        {{ $image->caption }}
                                    </small>
                                    @endif

                                </div>
                                @endforeach
                            </div>
                            @endif
                        </article>
                    </div>


                    <!-- SIDEBAR -->
                    <div class="col-lg-4">

                        <div class="news-sidebar">

                            <h4 class="mb-4">Berita Terbaru</h4>

                            @forelse($latestPosts as $latest)

                            <a href="{{ route('news.show', $latest->slug) }}" class="sidebar-news">

                                @if($latest->thumbnail)
                                <img src="{{ asset('storage/' . $latest->thumbnail) }}" alt="{{ $latest->title }}">
                                @else
                                <img src="{{ asset('assets/images/blog/blog-7.jpg') }}" alt="{{ $latest->title }}">
                                @endif

                                <div>
                                    <h6 class="mb-1">
                                        {{ $latest->title }}
                                    </h6>
                                    <small class="text-muted">
                                        {{ $latest->published_at->translatedFormat('d F Y') }}
                                    </small>
                                </div>

                            </a>

                            @empty

                            <p class="text-muted">
                                Belum ada berita lainnya.
                            </p>

                            @endforelse

                        </div>
                        <a href="{{ route('news.index') }}#news" class="btn btn-outline-secondary btn-pill my-4">
                            <i class="fa fa-arrow-left"></i>
                            Kembali ke Berita
                        </a>

                    </div>

                </div>


                <!-- BERITA TERKAIT -->
                @if($relatedPosts->count())

                <div class="mt-5">

                    <h3 class="mb-4">Berita Terkait</h3>

                    <div class="row">

                        @foreach($relatedPosts as $related)

                        <div class="col-md-4 mb-4">

                            <div class="card related-card h-100">

                                <a href="{{ route('news.show', $related->slug) }}">

                                    @if($related->thumbnail)
                                    <img src="{{ asset('storage/' . $related->thumbnail) }}"
                                        alt="{{ $related->title }}">
                                    @else
                                    <img src="{{ asset('assets/images/blog/blog-7.jpg') }}" alt="{{ $related->title }}">
                                    @endif

                                </a>

                                <div class="card-body">

                                    <small class="text-muted">
                                        {{ $related->published_at->translatedFormat('d F Y') }}
                                    </small>

                                    <h5 class="mt-2">
                                        <a href="{{ route('news.show', $related->slug) }}" class="text-dark">
                                            {{ $related->title }}
                                        </a>
                                    </h5>

                                </div>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

                @endif

            </div>
        </section>


        <!-- FOOTER -->
        <footer class="section-space bg-secondary py-4">
            Copyright © {{ (date('Y')=="2022"?date('Y'):"2022-".date('Y')) }} made with ❤️ by <a
                href="https://itic.jgu.ac.id">ITIC JGU</a>.<br><small
                class="ml-4 text-center text-sm text-light sm:text-right sm:ml-0">
                v{{ Illuminate\Foundation\Application::VERSION }}p{{ PHP_VERSION }} - All rights reserved.</small>
        </footer>

    </div>


    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/script2.js') }}"></script>

</body>

</html>
