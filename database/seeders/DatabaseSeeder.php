<?php

namespace Database\Seeders;

// Importações
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        $this->call([
            UsersSeeder::class,
        ]);

        $this->call([
            PostSeeder::class,
        ]);

        // $this->call([
        //     LikesSeeder::class,
        // ]);
    }
}
