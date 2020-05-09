<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        \App\Models\Contact::create([
            'email' => 'email@email.com',
            'phone' => '+62 83830803289',
            'address' => 'Jl. Arief Rachman Hakim No.150, Keputih, Sukolilo, Surabaya, Jawa Timur 60111',
            'g_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.537593027897!2d112.7903759145571!3d-7.293331873713251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa692db135a1%3A0x5f60546477dc7d86!2sHang+Tuah+University!5e0!3m2!1sen!2sid!4v1550024925321" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'
        ]);
    }
}
