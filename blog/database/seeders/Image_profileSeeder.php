<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;
use App\Models\Image_profile;

class Image_profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image_profile::create([
            "image" => "teste.png",
            "user_id" => 1
        ]);
        Image_profile::create([
            "image" => "c.jpg",
            "user_id" => 2
        ]);
        Image_profile::create([
            "image" => "perfilGato.hpg",
            "user_id" => 3
        ]);

    }
}
