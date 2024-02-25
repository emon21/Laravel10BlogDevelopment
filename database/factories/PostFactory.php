<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $post_title = $this->faker->name();

        $id = rand(1, 500);
        $image = 'https://picsum.photos/id/' . $id . '/200/300';

        return [

            'post_title' => $post_title,
            'slug' => Str::slug($post_title),
            'post_photo' => $image,
            'post_description' => $this->faker->text(),
            // 'category_id' => Category::random()->id(),
            'category_id' => Category::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            'status' => $this->faker->randomDigit(),
            'published_at' => Now()

            // 'category_id' => PostCategory::inRandomOrder()->value('id'),
            // 'author_id' => User::inRandomOrder()->value('id'),
            // 'title' => $title,
            // 'slug' => Str::slug($title),
            // 'image' => $image,
            // 'short_description' => $this->faker->sentence(10),
            // 'description' => $this->faker->paragraph(50),
            // 'status' => Arr::random(['published', 'draft']),

        ];
    }
}
