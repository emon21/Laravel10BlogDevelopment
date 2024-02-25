<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post Model
        // $post = New Post();
        // $post->category_id = '1';
        // $post->post_title = 'this title';
        // $post->slug = Str::slug($post->title);
        // $post->post_photo = 'backend/blog/default.jpg';
        // $post->post_description = 'good php code';
        // $post->status = 'publish';
        // $post->published_at = Now();
        // $post->save();

        $post = [
            'Post Title','Post Info','Dummy data','Information Data','Local Data'];

            $category = Category::all();

                // for ($category=0; $category <12 ; $category++) {
                //     $id = rand(1,12);
                //     foreach($post as $value){
                //         Post::create([
                //             'category_id' =>$id,
                //             'user_id' => 1,
                //             'post_title' => $value,
                //             'slug' => Str::slug($value,'-'),
                //             'post_photo' => 'backend/post/default.jpg',
                //             'post_description' => 'This is description',
                //             'status' => 'publish',
                //             'published_at' => Now(),
                //         ]);
                //     }
                // }


                    $id = rand(1,12);
                    foreach($post as $value){
                        Post::create([
                            'category_id' =>$id,
                            'user_id' => 2,
                            'post_title' => $value,
                            'slug' => Str::slug($value,'-'),
                            'post_photo' => 'backend/post/default.jpg',
                            'post_description' => 'This is description',
                            'status' => 'publish',
                            'published_at' => Now(),
                        ]);
                    }





            // $id = rand(1, 12);



    }
}
