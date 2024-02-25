<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Comment::Create([
            'user_id' => 1,
            'post_id' => 1,
            'message' => 'This is a First Comment',
        ]);
    }
}
