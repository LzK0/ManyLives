<?php

namespace Database\Seeders;

// Importações
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

        $postImages = [
            'images/posts/seed_post/Coffee.jpg',
            'images/posts/seed_post/Leaf.jpg',
            'images/posts/seed_post/LiricsLove.jpg',
            'images/posts/seed_post/Free.jpg'
        ];

        $userIds = User::where('id', '!=', 1)->pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            Post::create([
                "title" => "Título do post #$i",
                "description" => "Descrição do post #$i lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                "content" => "Conteúdo do post #$i Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
                Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
                Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
                "published_at" => now(),
                "image_post" => $postImages[array_rand($postImages)],
                "user_id" => $userIds[array_rand($userIds)]
            ]);
        }
    }
}
