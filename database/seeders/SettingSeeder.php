<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $setting = New Setting();
        $setting->site_name = 'About Us';
        $setting->site_name = Str::slug($setting->site_name,'-');
        $setting->about_site = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.";
        $setting->site_logo = 'backend/post/default.jpg';
        $setting->facebook= 'icon-facebook';
        $setting->twitter= 'icon-twitter';
        $setting->instagram= 'icon-instagram';
        $setting->reddit= 'icon-rss';
        $setting->email= 'icon-envelope';
        $setting->copyright= 'All rights reserved';
        $setting->save();
    }
}
