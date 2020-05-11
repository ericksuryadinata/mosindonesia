<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        for ($i=1; $i <=50; $i++) {
            \App\Models\Article::create([
                'category_article_id' => ($i % 2 == 1) ? 1 : 2,
                'title' => 'Tulisan Dumm ke '.$i,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, a. Modi commodi iure distinctio sed dignissimos sit, ut soluta eveniet iste quos assumenda cupiditate illum blanditiis tempora magnam temporibus sunt?',
                'image' => 'fallback image',
            ]);
        }
    }
}
