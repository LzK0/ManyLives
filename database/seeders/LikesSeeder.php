<?php

namespace Database\Seeders;

use App\Models\Likes_post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 1,
            "post_id" => 1
        ]);
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 2,
            "post_id" => 1
        ]);
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 3,
            "post_id" => 1
        ]);
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 1,
            "post_id" => 2
        ]);
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 2,
            "post_id" => 2
        ]);
        Likes_post::create([
            "likes" => 0,
            "verifica_likes_usuario" => 0,
            "user_id" => 3,
            "post_id" => 3
        ]);
    }
}
