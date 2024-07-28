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
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
        Post::create([
            "title" => "My First Post",
            "description" => "This is my first post.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "published_at" => "2022-01-01",
            "like" => 1,
            "image_post" => "nenhuma",
            "user_id" => 22
        ]);
    
    }
}