<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // Menampilkan seluruh berita

    public function index(Request $request)
    {
        $query = Post::with(['author', 'category']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $posts = $query->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }


    // Form tambah berita
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $file = $request->file('upload');

        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'posts/content',
            $fileName,
            'public'
        );

        return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => asset('storage/' . $path),
        ]);
    }

    public function uploadImageDialog(Request $request)
    {
        $funcNum = (int) $request->input('CKEditorFuncNum', 0);

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $file = $request->file('upload');

        $fileName = time() . '_' . uniqid() . '.' .
            $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'posts/content',
            $fileName,
            'public'
        );

        $url = asset('storage/' . $path);

        $html = '<script>';
        $html .= 'window.parent.CKEDITOR.tools.callFunction(';
        $html .= $funcNum . ', ' . json_encode($url);
        $html .= ');';
        $html .= '</script>';

        return response($html)
            ->header('Content-Type', 'text/html');
    }
    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        DB::beginTransaction();

        try {

            $thumbnail = null;

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail')
                    ->store('posts', 'public');
            }

            $post = Post::create([
                'author_id' => Auth::id(),
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => $this->generateSlug($request->title),
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'thumbnail' => $thumbnail,
                'status' => $request->status,
                'published_at' => $request->status == 'published'
                    ? now()
                    : null,
            ]);

            // Simpan galeri berita
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {

                    $path = $image->store('posts/gallery', 'public');

                    $post->images()->create([
                        'image_path' => $path,
                        'sort_order' => $index,
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Berita berhasil ditambahkan.');

        } catch (\Exception $e) {

            DB::rollBack();

            if ($thumbnail) {
                Storage::disk('public')->delete($thumbnail);
            }

            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }

    // Detail berita di dashboard
    public function show($id)
    {
        $post = Post::with([
            'category',
            'author',
            'images'
        ])->findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }
    // Form edit berita
    public function edit($id)
    {
        $post = Post::with(['images', 'tags'])->findOrFail($id);

        $categories = Category::orderBy('name')->get();

        return view('admin.posts.edit', compact(
            'post',
            'categories'
        ));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
        ]);

        DB::beginTransaction();

        try {

            $data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'status' => $request->status,
                'published_at' => $request->status == 'published'
                    ? ($post->published_at ?? now())
                    : null,
            ];

            if ($post->title !== $request->title) {
                $data['slug'] = $this->generateSlug(
                    $request->title,
                    $post->id
                );
            }

            // Update thumbnail
            if ($request->hasFile('thumbnail')) {

                $oldThumbnail = $post->thumbnail;

                $newThumbnail = $request->file('thumbnail')
                    ->store('posts', 'public');

                $data['thumbnail'] = $newThumbnail;

                if ($oldThumbnail) {
                    Storage::disk('public')->delete($oldThumbnail);
                }
            }

            $post->update($data);

            // Tambahkan foto galeri baru
            if ($request->hasFile('images')) {

                $lastOrder = $post->images()->max('sort_order') ?? -1;

                foreach ($request->file('images') as $index => $image) {

                    $path = $image->store('posts/gallery', 'public');

                    $post->images()->create([
                        'image_path' => $path,
                        'sort_order' => $lastOrder + $index + 1,
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Berita berhasil diperbarui.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    // Hapus berita
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Berita dan seluruh gambarnya berhasil dihapus.');
    }

    // Membuat slug otomatis dan unik
    private function generateSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Post::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
