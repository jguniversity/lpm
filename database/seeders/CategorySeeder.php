<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Berita LPM',
            'Penjaminan Mutu',
            'Audit Mutu Internal',
            'Akreditasi',
            'Evaluasi dan Monitoring',
            'Standar Mutu',
            'Sosialisasi dan Pelatihan',
            'Pengumuman',
            'Dokumen Mutu',
            'Kegiatan Kampus',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
