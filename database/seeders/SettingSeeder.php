<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeting =[
            [
               'phone'=>'5553215151',
               'email'=> 'info@gamil.com',
               'address' => 'Dhaka,banglades',
               'fackbook'=> 'https:/www.facebook.com/',
               'twitter'=> 'https:/x.com/',
               'linkedin'=> 'https:/www.linkedin.com/',
               'logo'=> 'logo.png'


            ],

        ];


        Setting::insert($seeting);
   }
}
