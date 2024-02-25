<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([

            CategorySeeder::class,
            // PostSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            SettingSeeder::class,
            CommentSeeder::class,

        ]);

        Post::factory()->count(20)->create();

        // Post::factory()->count(50)->create();
    }
}
