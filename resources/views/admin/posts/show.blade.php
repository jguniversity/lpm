@extends('layouts.master')
@section('title', 'Post Detail')

@section('css')
<style>
    .post-detail-card {
        overflow: hidden;
    }

    .post-thumbnail {
        width: 100%;
        max-height: 450px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 25px;
    }

    .post-title {
        font-size: 26px;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 15px;
        color: #2c323f;
    }

    .post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        color: #717b8c;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .post-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        font-size: 15px;
        line-height: 1.8;
        color: #333;
        overflow-wrap: anywhere;
    }

    .post-content img {
        max-width: 100% !important;
        height: auto !important;
        display: block;
        margin: 15px auto;
    }

    .post-content table {
        max-width: 100%;
    }

    .post-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }

    .post-gallery img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #eee;
    }

    .post-info-label {
        color: #8a8a8a;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .post-info-value {
        font-weight: 500;
        color: #333;
    }

    @media (max-width: 767px) {
        .post-title {
            font-size: 21px;
        }

        .post-meta {
            gap: 10px;
        }
    }

</style>
@endsection

@section('breadcrumb-title')
<h3>@yield('title')</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Content</li>
<li class="breadcrumb-item">
    <a href="{{ route('admin.posts.index') }}">Posts</a>
</li>
<li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- MAIN CONTENT --}}
        <div class="col-xl-9 col-lg-8">

            <div class="card post-detail-card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Post Detail</h4>

                    <div>
                        @if($post->status == 'published' && $post->published_at && $post->published_at <= now())
                            <a href="{{ route('news.show', $post->slug) }}"
                                target="_blank"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-external-link"></i>
                                Lihat Berita Publik
                            </a>
                        @endif
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Edit Post
                        </a>

                        <a href="{{ route('admin.posts.index') }}" class="btn btn-light btn-sm">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    {{-- Title --}}
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>

                    {{-- Meta --}}
                    <div class="post-meta">

                        <span>
                            <i class="fa fa-folder"></i>
                            {{ optional($post->category)->name ?? 'Uncategorized' }}
                        </span>

                        <span>
                            <i class="fa fa-user"></i>
                            {{ optional($post->author)->name ?? 'Unknown Author' }}
                        </span>

                        <span>
                            <i class="fa fa-calendar"></i>
                            {{ optional($post->published_at)->format('d M Y H:i') ?? '-' }}
                        </span>

                    </div>

                    {{-- Thumbnail --}}
                    @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="post-thumbnail"
                        alt="{{ $post->title }}">
                    @endif

                    {{-- Excerpt --}}
                    @if($post->excerpt)
                    <div class="post-excerpt">
                        {{ $post->excerpt }}
                    </div>
                    @endif

                    {{-- Content --}}
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>

                    {{-- Gallery --}}
                    @if($post->images && $post->images->count())
                    <div class="row">
                        @foreach($post->images as $image)
                        <div class="col-md-4 mb-3">
                            <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="{{ $image->caption ?? $post->title }}" class="img-fluid rounded"
                                    style="width: 100%; height: 180px; object-fit: cover;">
                            </a>

                            @if($image->caption)
                            <p class="mt-2">{{ $image->caption }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-muted">Belum ada foto galeri.</p>
                    @endif

                </div>

            </div>

        </div>

        {{-- SIDEBAR INFORMATION --}}
        <div class="col-xl-3 col-lg-4">

            {{-- Publication Information --}}
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title mb-0">Publication Information</h4>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <div class="post-info-label">Status</div>

                        @if($post->status == 'published')
                        <span class="badge badge-light-success">
                            Published
                        </span>
                        @elseif($post->status == 'draft')
                        <span class="badge badge-light-warning">
                            Draft
                        </span>
                        @else
                        <span class="badge badge-light-secondary">
                            Archived
                        </span>
                        @endif
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Category</div>
                        <div class="post-info-value">
                            {{ optional($post->category)->name ?? '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Author</div>
                        <div class="post-info-value">
                            {{ optional($post->author)->name ?? '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Created At</div>
                        <div class="post-info-value">
                            {{ $post->created_at ? $post->created_at->format('d M Y H:i') : '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Last Updated</div>
                        <div class="post-info-value">
                            {{ $post->updated_at ? $post->updated_at->format('d M Y H:i') : '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Published At</div>
                        <div class="post-info-value">
                            {{ $post->published_at ? $post->published_at->format('d M Y H:i') : '-' }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <div class="post-info-label">Views</div>
                        <div class="post-info-value">
                            {{ number_format($post->views ?? 0) }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-0">
                        <div class="post-info-label">Slug</div>
                        <div class="post-info-value text-break">
                            {{ $post->slug }}
                        </div>
                    </div>

                    <hr>

                    <div class="mb-0">
                        <div class="post-info-label">Tags</div>
                            @if ($post->tags->count() > 0)
                                <div class="post-tags mb-3">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('news.index', ['tag' => $tag->slug]) }}"
                                        class="badge badge-dark mr-1">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
