<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::where('id', '!=', 1)->pluck('id');
        $postIds = Post::pluck('id');


        $likesCount = 5000;

        for ($i = 0; $i < $likesCount; $i++) {
            $userId = $userIds->random();
            $postId = $postIds->random();

            Like::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
        }
    }
}
