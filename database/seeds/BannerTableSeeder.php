<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->truncate();

        \App\Models\Banner::create([
            'title' => 'a niche',
            'description' => 'Description about your business',
            'url' => 'image url',
            'active' => 1
        ]);
    }
}
