<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Bidang Studi',
                'status' => 'active'
            ],
            [
                'title' => 'Program Sekolah',
                'status' => 'active'
            ],
            [
                'title' => 'Layanan Jasa',
                'status' => 'active'
            ]
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
