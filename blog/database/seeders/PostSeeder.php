<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2022-01-01",
            "like" => 1,
            "image_posts" => "nenhuma",
            "user_id" => 1
        ]);
        Post::create([
            "title" => "My second Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2021-01-01",
            "like" => 0,
            "image_posts" => "nenhuma",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "My sla Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2024-01-01",
            "like" => 1,
            "image_posts" => "nenhuma",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2022-01-01",
            "like" => 1,
            "image_posts" => "nenhuma",
            "user_id" => 1
        ]);
        Post::create([
            "title" => "My sla Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2024-01-01",
            "like" => 1,
            "image_posts" => "nenhuma",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "My second Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "publicado" => "2021-01-01",
            "like" => 0,
            "image_posts" => "nenhuma",
            "user_id" => 3
        ]);
    }
}
