<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $bidangStudiId = \App\Models\Category::where('title', 'Bidang Studi')->first()->id;
        $programSekolahId = \App\Models\Category::where('title', 'Program Sekolah')->first()->id;
        $layananJasaId = \App\Models\Category::where('title', 'Layanan Jasa')->first()->id;

        $subCategories = [
            // Bidang Studi
            [
                'category_id' => $bidangStudiId,
                'title' => 'Komputer Umum & Internet',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Administrasi Perkantoran',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Komputer Akuntansi',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Digital Marketing',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Animasi 2D & 3D',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Website Desain CMS',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Desain Grafis',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Desain Interior',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Desain Arsitektur',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Pemrograman Dasar',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Pemrograman Web Designer',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Pemrograman Web',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Pemrograman Android',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Videography',
                'status' => 'active'
            ],
            [
                'category_id' => $bidangStudiId,
                'title' => 'Photography',
                'status' => 'active'
            ],

            // Program Sekolah
            [
                'category_id' => $programSekolahId,
                'title' => 'Pilihan Program',
                'status' => 'active'
            ],
            [
                'category_id' => $programSekolahId,
                'title' => 'Pilihan Kami',
                'status' => 'active'
            ],

            // Layanan Jasa
            [
                'category_id' => $layananJasaId,
                'title' => 'Branding & Design',
                'status' => 'active'
            ],
            [
                'category_id' => $layananJasaId,
                'title' => 'Web Development',
                'status' => 'active'
            ],
            [
                'category_id' => $layananJasaId,
                'title' => 'Mobile Apps (Android & iOS)',
                'status' => 'active'
            ]
        ];

        foreach ($subCategories as $subCategory) {
            \App\Models\SubCategory::create($subCategory);
        }
    }
}
