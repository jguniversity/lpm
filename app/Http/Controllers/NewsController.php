<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Daftar berita publik
    public function index(Request $request)
    {
        $query = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // Pencarian berita
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->orderBy('published_at', 'desc')
            ->paginate(9)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('news.index', compact('posts', 'categories'));
    }

    // Detail berita publik
    public function show($slug)
    {
        $post = Post::with([
            'category',
            'author',
            'images',
            'tags'
        ])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('slug', $slug)
            ->firstOrFail();

        // Tambahkan jumlah pembaca
        $post->increment('views');

        // Berita terbaru
        $latestPosts = Post::with(['category', 'author'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        // Ambil ID Tag dari berita yang sedang dibuka
        $tagIds = $post->tags->pluck('id');

        // Berita terkait berdasarkan Tag
        $relatedPosts = collect();

        if ($tagIds->isNotEmpty()) {
            $relatedPosts = Post::with([
                'category',
                'author',
                'tags'
            ])
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->where('id', '!=', $post->id)
                ->whereHas('tags', function ($query) use ($tagIds) {
                    $query->whereIn('tags.id', $tagIds);
                })
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        }

        // Jika tidak ada berita dengan Tag yang sama,
        // cari berita berdasarkan kategori
        if ($relatedPosts->isEmpty() && $post->category_id) {
            $relatedPosts = Post::with([
                'category',
                'author',
                'tags'
            ])
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        }

        return view('news.detail', compact(
            'post',
            'latestPosts',
            'relatedPosts'
        ));
    }

}
