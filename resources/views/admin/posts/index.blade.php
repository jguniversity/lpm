
@extends('layouts.master')
@section('title', 'Posts')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/sweetalert2.css')}}">
@endsection

@section('style')
<style>
    .post-thumbnail {
        width: 85px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    .post-title {
        max-width: 300px;
        white-space: normal !important;
    }

    .post-title small {
        display: block;
        margin-top: 5px;
    }

    .post-actions {
        white-space: nowrap;
    }

    .post-actions form {
        display: inline-block;
    }

    .table td {
        vertical-align: middle;
    }
</style>
@endsection

@section('breadcrumb-title')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Admin</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- Filter & Action --}}
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row align-items-center">

                    <div class="col-md-3">
                        <form action="{{ route('admin.posts.index') }}" method="GET">
                            <select name="status"
                                class="form-control input-sm select2"
                                data-placeholder="Status"
                                onchange="this.form.submit()">

                                <option value="">All Status</option>

                                <option value="draft"
                                    {{ request('status') == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ request('status') == 'published' ? 'selected' : '' }}>
                                    Published
                                </option>

                                <option value="archived"
                                    {{ request('status') == 'archived' ? 'selected' : '' }}>
                                    Archived
                                </option>

                            </select>

                            @if(request('search'))
                                <input type="hidden" name="search"
                                    value="{{ request('search') }}">
                            @endif
                        </form>
                    </div>

                    <div class="col-md-6">
                        <form action="{{ route('admin.posts.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search news title..."
                                    value="{{ request('search') }}">

                                @if(request('status'))
                                    <input type="hidden" name="status"
                                        value="{{ request('status') }}">
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    <i data-feather="search"></i>
                                    Search
                                </button>

                                <a href="{{ route('admin.posts.index') }}"
                                    class="btn btn-light">
                                    Reset
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3 d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <a class="btn btn-primary"
                            title="Add new post"
                            href="{{ route('admin.posts.create') }}">

                            <i data-feather="plus"></i>
                            New Post

                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show">
                <i data-feather="check-circle"></i>
                {{ session('success') }}

                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}

                <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
            </div>
        </div>
        @endif

        {{-- Posts Table --}}
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h5>News Management</h5>
                    <span>Manage news and publications of LPM JGU.</span>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover table-sm" width="100%">

                            <thead>
                                <tr>
                                    <th width="35px" class="text-center">#</th>
                                    <th width="100px">Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th width="120px">Published</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th width="100px" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($posts as $index => $post)

                                <tr>

                                    {{-- Number --}}
                                    <td class="text-center">
                                        {{ $posts->firstItem() + $index }}
                                    </td>

                                    {{-- Thumbnail --}}
                                    <td>
                                        @if($post->thumbnail)
                                            <img
                                                src="{{ asset('storage/'.$post->thumbnail) }}"
                                                alt="{{ $post->title }}"
                                                class="post-thumbnail">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center post-thumbnail">
                                                <i data-feather="image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Title --}}
                                    <td class="post-title">
                                        <strong>{{ $post->title }}</strong>

                                        <small class="text-muted">
                                            {{ \Illuminate\Support\Str::limit($post->excerpt, 80) }}
                                        </small>
                                    </td>

                                    {{-- Category --}}
                                    <td>
                                        {{ optional($post->category)->name ?? '-' }}
                                    </td>

                                    {{-- Author --}}
                                    <td>
                                        {{ optional($post->author)->name ?? '-' }}
                                    </td>

                                    {{-- Published Date --}}
                                    <td>
                                        @if($post->published_at)
                                            {{ $post->published_at->format('d M Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        @if($post->status == 'published')
                                            <span class="badge badge-light-success">
                                                Published
                                            </span>

                                        @elseif($post->status == 'draft')
                                            <span class="badge badge-light-warning">
                                                Draft
                                            </span>

                                        @elseif($post->status == 'archived')
                                            <span class="badge badge-light-secondary">
                                                Archived
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Views --}}
                                    <td>
                                        {{ number_format($post->views) }}
                                    </td>

                                    {{-- Action --}}
                                    <td class="text-center post-actions">

                                        {{-- Detail --}}
                                        <a class="btn btn-info btn-sm px-2"
                                            title="Detail"
                                            href="{{ route('admin.posts.show', $post->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a class="btn btn-success btn-sm px-2"
                                            title="Edit"
                                            href="{{ route('admin.posts.edit', $post->id) }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.posts.destroy', $post->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this post?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm px-2"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="9" class="text-center py-5">

                                        <i data-feather="file-text"
                                            style="width:40px;height:40px;color:#999;">
                                        </i>

                                        <h6 class="mt-3">
                                            No News Found
                                        </h6>

                                        <p class="text-muted">
                                            There are no news articles available.
                                        </p>

                                        <a href="{{ route('admin.posts.create') }}"
                                            class="btn btn-primary btn-sm">
                                            <i data-feather="plus"></i>
                                            Add New Post
                                        </a>

                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">

                        <div class="text-muted mb-2">
                            Showing {{ $posts->firstItem() ?? 0 }}
                            to {{ $posts->lastItem() ?? 0 }}
                            of {{ $posts->total() }} posts
                        </div>

                        <div>
                            {{ $posts->withQueryString()->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    "use strict";

    $(document).ready(function () {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>
@endsection
