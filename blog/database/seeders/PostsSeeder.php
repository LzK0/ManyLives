<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'My first post',
            'description' => 'My first post description',
            'content' => 'My first post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'My second post',
            'description' => 'My second post description',
            'content' => 'My second post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);	
        Post::create([
            'title' => 'My first post',
            'description' => 'My first post description',
            'content' => 'My first post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'My second post',
            'description' => 'My second post description',
            'content' => 'My second post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);	
        Post::create([
            'title' => 'My first post',
            'description' => 'My first post description',
            'content' => 'My first post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'My second post',
            'description' => 'My second post description',
            'content' => 'My second post content',
            'publicado' => '2022-07-27',
            'like' => 0,
            'image_posts' => 'nao tem',
            'user_id' => 1
        ]);	
    }
}
