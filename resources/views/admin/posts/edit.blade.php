
@extends('layouts.master')
@section('title', 'Edit Post')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
@endsection

@section('style')
<style>
    .thumbnail-preview {
        width: 100%;
        max-width: 350px;
        height: 200px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
    }

    .gallery-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .gallery-preview img {
        width: 100px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }

    .required {
        color: red;
    }

    .cke_chrome {
        border: 1px solid #ced4da !important;
        border-radius: 5px !important;
        box-shadow: none !important;
        overflow: hidden;
    }

    .cke_top {
        border-bottom: 1px solid #ced4da !important;
    }

    .cke_contents,
    .cke_wysiwyg_frame {
        background-color: #ffffff !important;
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
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">

            <form class="card"
                method="POST"
                action="{{ route('admin.posts.update', $post->id) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Post</h4>
                    <div class="card-options">
                        <a class="card-options-collapse" href="#"
                            data-bs-toggle="card-collapse">
                            <i class="fe fe-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        {{-- LEFT COLUMN --}}
                        <div class="col-lg-9 col-md-12">

                            {{-- Title --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    News Title <i class="required">*</i>
                                </label>

                                <input type="text"
                                    id="title"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $post->title) }}"
                                    placeholder="Enter news title"
                                    required>

                                @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Slug --}}
                            <div class="form-group">
                                <label class="col-form-label">Slug</label>

                                <input type="text"
                                    id="slug"
                                    name="slug"
                                    class="form-control"
                                    value="{{ old('slug', $post->slug) }}"
                                    readonly>

                                <small class="text-muted">
                                    Slug will be generated automatically from title.
                                </small>
                            </div>

                            {{-- Excerpt --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    Short Description / Excerpt
                                </label>

                                <textarea name="excerpt"
                                    rows="3"
                                    class="form-control @error('excerpt') is-invalid @enderror"
                                    placeholder="Write a short description of the news...">{{ old('excerpt', $post->excerpt) }}</textarea>

                                @error('excerpt')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Content --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    News Content <i class="required">*</i>
                                </label>

                                <textarea name="content"
                                    id="content"
                                    rows="15"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Write your news content here..."
                                    required>{{ old('content', $post->content) }}</textarea>

                                @error('content')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        {{-- RIGHT COLUMN --}}
                        <div class="col-lg-3 col-md-12">

                            {{-- Category --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    Category
                                </label>

                                <select name="category_id"
                                    id="category_id"
                                    class="form-select select2 @error('category_id') is-invalid @enderror">

                                    <option value="">Select Category</option>

                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach

                                </select>

                                @error('category_id')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Thumbnail --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    Featured Image / Thumbnail
                                </label>

                                <input type="file"
                                    name="thumbnail"
                                    id="thumbnail"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="form-control @error('thumbnail') is-invalid @enderror">

                                <small class="text-muted">
                                    JPG, PNG, WEBP. Maximum 2 MB.
                                    Leave empty to keep the current image.
                                </small>

                                @error('thumbnail')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @if($post->thumbnail)
                                <div class="mt-2">
                                    <label class="form-label">Current Thumbnail</label>
                                    <img
                                        id="thumbnail-preview"
                                        src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="thumbnail-preview"
                                        alt="Current Thumbnail">
                                </div>
                                @else
                                <img
                                    id="thumbnail-preview"
                                    class="thumbnail-preview"
                                    alt="Thumbnail Preview"
                                    style="display:none;">
                                @endif
                            </div>

                            <hr>

                            {{-- Gallery --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    Gallery Images
                                </label>

                                <input type="file"
                                    name="images[]"
                                    id="gallery"
                                    accept="image/jpeg,image/png,image/webp"
                                    class="form-control @error('images.*') is-invalid @enderror"
                                    multiple>

                                <small class="text-muted">
                                    Select additional images for this post.
                                </small>

                                @error('images.*')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div id="gallery-preview" class="gallery-preview"></div>
                            </div>

                            <hr>

                            {{-- Status --}}
                            <div class="form-group">
                                <label class="col-form-label">
                                    Publication Status <i class="required">*</i>
                                </label>

                                <select name="status"
                                    id="status"
                                    class="form-select @error('status') is-invalid @enderror"
                                    required>

                                    <option value="draft"
                                        {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                    <option value="published"
                                        {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>
                                        Published
                                    </option>

                                    <option value="archived"
                                        {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>
                                        Archived
                                    </option>

                                </select>

                                @error('status')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- Publish Date --}}
                                <div class="form-group mt-3">
                                    <label class="col-form-label">
                                        Publish Date & Time
                                    </label>

                                    <input type="datetime-local"
                                        name="published_at"
                                        class="form-control @error('published_at') is-invalid @enderror"
                                        value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">

                                    <small class="text-muted">
                                        Set the publication date and time.
                                    </small>

                                    @error('published_at')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="alert alert-light-info mt-3">
                                <strong>Information:</strong>
                                <p class="mb-0 mt-2">
                                    Published news will be displayed
                                    on the LPM JGU website.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="card-footer text-end">

                    <a href="{{ route('admin.posts.index') }}"
                        class="btn btn-secondary">
                        Cancel
                    </a>

                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-save"></i> Update Post
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>

<script>
    "use strict";

    $(document).ready(function () {

        // Select2
        $('.select2').select2({
            width: '100%',
            placeholder: 'Select Category',
            allowClear: true
        });

        // CKEditor 4
        CKEDITOR.replace('content', {
            height: 400,
            language: 'en',

            image_previewText: 'Preview gambar akan ditampilkan di sini.',

            extraPlugins: 'uploadimage',
            uploadUrl: '{{ route("admin.posts.upload-image") }}',
            filebrowserUploadUrl: '{{ route("admin.posts.upload-image-dialog", ["_token" => csrf_token()]) }}',
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.on('instanceReady', function(event) {
            var editor = event.editor;

            editor.on('fileUploadRequest', function(evt) {
                var xhr = evt.data.fileLoader.xhr;
                var csrf = document.querySelector('meta[name="csrf-token"]');

                if (csrf) {
                    xhr.setRequestHeader(
                        'X-CSRF-TOKEN',
                        csrf.content
                    );
                }
            });
        });

        // Slug preview
        $('#title').on('input', function () {
            let slug = $(this).val()
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            $('#slug').val(slug);
        });

        // Thumbnail preview
        $('#thumbnail').on('change', function (event) {
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $('#thumbnail-preview')
                        .attr('src', e.target.result)
                        .show();
                };

                reader.readAsDataURL(file);
            }
        });

        // Gallery preview
        $('#gallery').on('change', function (event) {
            let preview = $('#gallery-preview');
            preview.empty();

            Array.from(event.target.files).forEach(function (file) {
                if (!file.type.startsWith('image/')) return;

                let reader = new FileReader();

                reader.onload = function (e) {
                    $('<img>', {
                        src: e.target.result
                    }).appendTo(preview);
                };

                reader.readAsDataURL(file);
            });
        });

        if (typeof feather !== 'undefined') {
            feather.replace();
        }

    });
</script>

@endsection
