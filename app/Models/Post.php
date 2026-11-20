<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'author_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'status',
        'is_featured',
        'published_at',
        'views',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
    
    protected static function booted()
    {
        static::deleting(function ($post) {

            // Hapus thumbnail
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            // Hapus seluruh gambar galeri
            foreach ($post->images as $image) {
                if ($image->image_path) {
                    Storage::disk('public')->delete($image->image_path);
                }

                // Hapus record gambar galeri
                $image->delete();
            }
        });
    }
}
