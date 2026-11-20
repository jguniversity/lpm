
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - LPM JGU</title>

    <meta name="description" content="Informasi dan berita terbaru LPM Jakarta Global University.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    @include('layouts.css')

    <style>
        body {
            background: #f8f9fa;
        }

        .news-page {
            padding: 60px 0;
            min-height: 80vh;
        }

        .news-heading {
            margin-bottom: 35px;
        }

        .news-heading h2 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .news-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 2px 12px rgba(0,0,0,.05);
            transition: .3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,.10);
        }

        .news-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .news-body {
            padding: 20px;
        }

        .news-category {
            display: inline-block;
            font-size: 12px;
            color: #dc3545;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .news-date {
            font-size: 13px;
            color: #999;
            margin-bottom: 12px;
        }

        .news-title {
            font-size: 18px;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .news-title a {
            color: #333;
            text-decoration: none;
        }

        .news-title a:hover {
            color: #dc3545;
        }

        .news-excerpt {
            font-size: 14px;
            color: #777;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .news-readmore {
            color: #dc3545;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .news-readmore:hover {
            color: #a71d2a;
        }

        .news-filter {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 12px rgba(0,0,0,.04);
        }

        .news-filter .form-control,
        .news-filter .form-select {
            min-height: 42px;
        }

        .news-empty {
            background: #fff;
            padding: 50px 20px;
            border-radius: 10px;
            text-align: center;
        }

        .pagination {
            justify-content: center;
            margin-top: 35px;
        }

        @media (max-width: 767px) {
            .news-page {
                padding: 35px 0;
            }

            .news-image {
                height: 200px;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <section class="news-page">
        <div class="container">

            {{-- Judul halaman --}}
            <div class="news-heading text-center">
                <h2>Berita LPM JGU</h2>
                <p class="text-muted">
                    Informasi, kegiatan, dan berita terbaru Jakarta Global University.
                </p>
            </div>

            {{-- Filter dan pencarian --}}
            <div class="news-filter">
                <form action="{{ route('news.index') }}" method="GET">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari berita..."
                                value="{{ request('search') }}">
                        </div>

                        <div class="col-md-4">
                            <select name="category" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->slug }}"
                                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            {{-- Daftar berita --}}
            <div class="row g-4">

                @forelse($posts as $post)

                    <div class="col-md-6 col-lg-4">

                        <div class="news-card">

                            <a href="{{ route('news.show', $post->slug) }}">
                                @if($post->thumbnail)
                                    <img
                                        src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="news-image"
                                        alt="{{ $post->title }}">
                                @else
                                    <img
                                        src="{{ asset('assets/images/blog/blog-7.jpg') }}"
                                        class="news-image"
                                        alt="{{ $post->title }}">
                                @endif
                            </a>

                            <div class="news-body">

                                <div class="news-category">
                                    {{ $post->category->name ?? 'Berita' }}
                                </div>

                                <div class="news-date">
                                    <i class="fa fa-calendar"></i>
                                    {{ $post->published_at->translatedFormat('d F Y') }}
                                </div>

                                <h5 class="news-title">
                                    <a href="{{ route('news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h5>

                                <p class="news-excerpt">
                                    {{ \Illuminate\Support\Str::limit($post->excerpt ?: strip_tags($post->content), 120) }}
                                </p>

                                <a href="{{ route('news.show', $post->slug) }}" class="news-readmore">
                                    Baca Selengkapnya
                                    <i class="fa fa-arrow-right"></i>
                                </a>

                            </div>
                        </div>

                    </div>

                @empty

                    <div class="col-12">
                        <div class="news-empty">
                            <i data-feather="file-text" style="width:45px;height:45px;color:#ccc;"></i>
                            <h5 class="mt-3">Berita Tidak Ditemukan</h5>
                            <p class="text-muted">
                                Belum ada berita yang tersedia atau sesuai dengan pencarian Anda.
                            </p>
                            <a href="{{ route('news.index') }}" class="btn btn-danger btn-sm">
                                Lihat Semua Berita
                            </a>
                        </div>
                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $posts->links() }}
            </div>

        </div>
    </section>

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/script2.js') }}"></script>

<script>
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
</script>

</body>
</html>
