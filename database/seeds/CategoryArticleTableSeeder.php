<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_articles')->truncate();

        \App\Models\CategoryArticle::insert([
            [
                'name' => 'Kategori Pertama',
                'slug' => 'kategori-pertama',
                'description' => 'Kategori Pertama',
            ],
            [
                'name' => 'Kategori Kedua',
                'slug' => 'kategori-kedua',
                'description' => 'Kategori Kedua',
            ]
        ]);
    }
}
