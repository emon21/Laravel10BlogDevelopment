<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $category = [
            'PHP','Laravel','Html','Css','Vue jS','Java','Python','Apps','Nuxt JS' ,'Asp.Net','C#','React JS'
        ];

        foreach($category AS $value){
            Category::create([
                'category_name' => $value,
                'category_slug' => Str::slug($value),
             ]);
        }

        // Category::factory(10)->create();

    }
}
