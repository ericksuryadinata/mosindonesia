<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(CategoryArticleTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
    }
}
