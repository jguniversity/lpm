<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Basic -->
    <title>{{ $post->title }} | LPM Jakarta Global University</title>

    <meta name="description"
        content="{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 160) }}">

    <meta name="author" content="LPM JGU">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ route('news.show', $post->slug) }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description"
        content="{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 160) }}">
    <meta property="og:url" content="{{ route('news.show', $post->slug) }}">
    <meta property="og:site_name" content="LPM Jakarta Global University">

    @if($post->thumbnail)
    <meta property="og:image" content="{{ asset('storage/' . $post->thumbnail) }}">
    @endif

    <meta property="article:published_time"
        content="{{ optional($post->published_at)->toIso8601String() }}">

    @if($post->category)
    <meta property="article:section" content="{{ $post->category->name }}">
    @endif

    @foreach($post->tags as $tag)
    <meta property="article:tag" content="{{ $tag->name }}">
    @endforeach

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description"
        content="{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 160) }}">

    @if($post->thumbnail)
    <meta name="twitter:image" content="{{ asset('storage/' . $post->thumbnail) }}">
    @endif

    <!-- Google Fonts -->
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

        .post-excerpt {
            font-size: 16px;
            line-height: 1.7;
            color: #555;
            font-style: italic;
            padding: 15px 20px;
            border-left: 4px solid #7366ff;
            background: #f8f8fc;
            margin-bottom: 25px;
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

    <!-- Schema.org NewsArticle -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "NewsArticle",
        "mainEntityOfPage": {
            "@@type": "WebPage",
            "@@id": "{{ route('news.show', $post->slug) }}"
        },
        "headline": @json($post->title),
        "description": @json(Str::limit(strip_tags($post->excerpt ?: $post->content), 160)),
        "image": [
            @if($post->thumbnail)
                @json(asset('storage/' . $post->thumbnail))
            @else
                @json(asset('assets/images/blog/blog-7.jpg'))
            @endif
        ],
        "datePublished": "{{ optional($post->published_at)->toIso8601String() }}",
        "dateModified": "{{ optional($post->updated_at)->toIso8601String() }}",
        "author": {
            "@@type": "Organization",
            "name": "LPM JGU",
            "url": "{{ url('/') }}"
        },
        "publisher": {
            "@@type": "Organization",
            "name": "Lembaga Penjaminan Mutu Jakarta Global University",
            "logo": {
                "@@type": "ImageObject",
                "url": "{{ asset('assets/images/logo-white.png') }}"
            }
        }
    }
    </script>

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
                            <h1 class="news-title">
                                {{ $post->title }}
                            </h1>

                            <div class="news-meta">
                                <span class="me-3">
                                    <i class="fa fa-calendar"></i>
                                    {{ $post->published_at->translatedFormat('d F Y') }}
                                </span>

                                <span class="me-3">
                                    <i class="fa fa-folder"></i>
                                    {{ $post->category->name ?? 'Berita' }}
                                </span>

                                <span class="me-3">
                                    <i class="fa fa-eye"></i>
                                    {{ number_format($post->views, 0, ',', '.') }} kali dilihat
                                </span>

                                <span class="me-3">
                                    <i class="fa fa-user"></i>
                                    {{ $post->author->name ?? 'LPM JGU' }}
                                </span>
                            </div>
                            <hr>
                            {{-- Excerpt --}}
                            @if($post->excerpt)
                            <div class="post-excerpt">
                                {{ $post->excerpt }}
                            </div>
                            @endif

                            <div class="post-content">
                                {!! $post->content !!}
                            </div>

                            @if ($post->tags->isNotEmpty())
                                <div class="post-tags mt-3 mb-3">
                                    <strong>Tags:</strong>

                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-primary">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="news-share mt-3 mb-4">
                                <span class="me-2 fw-bold">Bagikan:</span>

                                @php
                                    $shareUrl = route('news.show', $post->slug);
                                    $shareTitle = $post->title;
                                @endphp

                                <a href="https://wa.me/?text={{ urlencode($shareTitle . ' ' . $shareUrl) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-success btn-sm me-1"
                                    title="Bagikan ke WhatsApp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-sm me-1"
                                    title="Bagikan ke Facebook" style="background-color: blue; color:white">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($shareTitle) }}&url={{ urlencode($shareUrl) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-dark btn-sm me-1"
                                    title="Bagikan ke X">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <button type="button"
                                    onclick="copyNewsLink()"
                                    class="btn btn-light btn-sm"
                                    title="Salin link berita">
                                    <i class="fa fa-link"></i> Link
                                </button>
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
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="news-thumbnail"
                                alt="{{ $post->title }}">
                        @endif

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
                        <div class="text-end">
                            <a href="{{ route('news.index') }}#news" class="btn btn-outline-secondary btn-pill my-4  text-end">
                                <i class="fa fa-arrow-left"></i>
                                Kembali ke Berita
                            </a>
                        </div>

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

    <script>
        function copyNewsLink() {
            const url = "{{ route('news.show', $post->slug) }}";

            navigator.clipboard.writeText(url).then(function () {
                alert('Link berita berhasil disalin!');
            }).catch(function () {
                alert('Gagal menyalin link berita.');
            });
        }
    </script>


</body>

</html>
