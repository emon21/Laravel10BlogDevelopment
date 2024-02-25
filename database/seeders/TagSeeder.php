<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // $tag = [
        //     'PHP','Laravel'];
        $tag = [
            'PHP','Laravel','Html','Css','Vue jS','Java','Python','Apps','Nuxt JS' ,'Asp.Net','C#','React JS'
        ];

        foreach($tag AS $value){

            Tag::create([
                'name' => $value,
                'slug' => Str::slug($value),
             ]);
        }
    }
}
