
{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Halaman utama -->
    <url>
        <loc>{{ htmlspecialchars(url('/'), ENT_XML1, 'UTF-8') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Halaman daftar berita -->
    <url>
        <loc>{{ htmlspecialchars(route('news.index'), ENT_XML1, 'UTF-8') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    <!-- Detail berita -->
    @foreach ($posts as $post)
        <url>
            <loc>{{ htmlspecialchars(route('news.show', $post->slug), ENT_XML1, 'UTF-8') }}</loc>
            <lastmod>{{ optional($post->updated_at)->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
