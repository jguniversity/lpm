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
        $post = Post::with(['category', 'author', 'images'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('slug', $slug)
            ->firstOrFail();

        // Tambahkan jumlah pembaca
        $post->increment('views');

        $latestPosts = Post::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $relatedPosts = Post::where('status', 'published')
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('news.detail', compact(
            'post',
            'latestPosts',
            'relatedPosts'
        ));
    }
}
