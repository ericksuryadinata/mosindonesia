<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->truncate();

        $icons = ['fa-laptop', 'fa-network-wired', 'fa-laptop-code', 'fa-code', 'fa-video', 'fa-magic'];

        foreach ($icons as $icon) {
            \App\Models\Service::create([
                'title' => 'Nama Service',
                'description' => 'Penjelasan singkat tentang service yang mau dikerjakan',
                'icon' => $icon,
                'active' => 1
            ]);
        }
    }
}
