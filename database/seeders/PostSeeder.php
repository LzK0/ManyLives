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
        Post::create([
            "title" => "Como o café ativa seu cerebro",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Coffee.jpg",
            "user_id" => 6
        ]);
        Post::create([
            "title" => "As folhas caem mais na primavera?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Leaf.jpg",
            "user_id" => 6
        ]);
        Post::create([
            "title" => "Como os letreros chamam sua atenção?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/LiricsLove.jpg",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "A liberdade é relativa?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            ",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Free.jpg",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "Como o café ativa seu cerebro",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Coffee.jpg",
            "user_id" => 6
        ]);
        Post::create([
            "title" => "As folhas caem mais na primavera?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "error",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "Como os letreros chamam sua atenção?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "error",
            "user_id" => 5
        ]);
        Post::create([
            "title" => "As folhas caem mais na primavera?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Leaf.jpg",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "Como os letreros chamam sua atenção?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/LiricsLove.jpg",
            "user_id" => 5
        ]);
        Post::create([
            "title" => "A liberdade é relativa?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            ",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Free.jpg",
            "user_id" => 4
        ]);
        Post::create([
            "title" => "Como o café ativa seu cerebro",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Coffee.jpg",
            "user_id" => 4
        ]);
        Post::create([
            "title" => "A liberdade é relativa?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "error",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "Como os letreros chamam sua atenção?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "error",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "As folhas caem mais na primavera?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Leaf.jpg",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "Como os letreros chamam sua atenção?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/LiricsLove.jpg",
            "user_id" => 2
        ]);
        Post::create([
            "title" => "A liberdade é relativa?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            ",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Free.jpg",
            "user_id" => 3
        ]);
        Post::create([
            "title" => "A liberdade é relativa?",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            ",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Free.jpg",
            "user_id" => 4
        ]);
        Post::create([
            "title" => "Como o café ativa seu cerebro",
            "description" => "lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.
            Praesent euismod, nisl sit amet ultricies tincidunt, libero nunc ultricies nisl, ut aliquet nunc nisl sit amet nunc.",
            "published_at" => now(),
            "image_post" => "images/posts/seed_post/Coffee.jpg",
            "user_id" => 5
        ]);
    }
}
