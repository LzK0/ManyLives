<?php

namespace Database\Seeders;

// Importações
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Roger',
            'image' => 'images/users/seed_user/ImagemDoADM.jpg',
            'email' => 'admin@admin',
            'password' => 'admin123',
        ]);
        User::create([
            'name' => 'Iza',
            'image' => 'images/users/seed_user/iza_profile.jpg',
            'email' => 'iza@iza',
            'password' => encrypt('123456'),
            'links' => 0,
            'instagram' => 'https://www.instagram.com',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com'
        ]);
        User::create([
            'name' => 'Antonio',
            'image' => 'images/users/seed_user/antonio_profile.jpg',
            'email' => 'antonio@antonio',
            'password' => encrypt('123456'),
            'links' => 1,
            'instagram' => 'https://www.instagram.com'
        ]);
        User::create([
            'name' => 'Lukas',
            'image' =>  'images/users/seed_user/white_cat.jpg',
            'email' => 'lukas@lukas',
            'password' => encrypt('123456')
        ]);
        User::create([
            'name' => 'Marta',
            'image' =>  'images/users/seed_user/marta_profile.jpg',
            'email' => 'marta@marta',
            'password' => encrypt('123456'),
            'links' => 1,
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com'
        ]);
        User::create([
            'name' => 'Bea',
            'image' =>  'images/users/seed_user/orange_cat.jpg',
            'email' => 'bea@bea',
            'password' => encrypt('123456'),
            'links' => 1,
            'instagram' => 'https://www.instagram.com',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com'
        ]); {
            $images = [
                'images/users/seed_user/iza_profile.jpg',
                'images/users/seed_user/antonio_profile.jpg',
                'images/users/seed_user/white_cat.jpg',
                'images/users/seed_user/marta_profile.jpg',
                'images/users/seed_user/orange_cat.jpg',
                'images/fixed/guestUser.jpg'
            ];

            $names = ['Alice', 'Bob', 'Charlie', 'Diana', 'Edward', 'Fiona', 'George', 'Hannah', 'Ian', 'Jane', 'Ken', 'Liam', 'Mia', 'Noah', 'Olivia', 'Paul', 'Quinn', 'Rachel', 'Sam', 'Tina', 'Uma', 'Vera', 'Will', 'Xander', 'Yara', 'Zane', 'Alex', 'Britt', 'Cory', 'Dana', 'Eli', 'Faye', 'Gus', 'Holly', 'Ivy', 'Jack', 'Kara', 'Leo', 'Maya', 'Nina', 'Oscar', 'Pia', 'Riley', 'Seth', 'Tess', 'Ulysses', 'Violet', 'Wyatt', 'Xena', 'Yves', 'Zara'];

            foreach ($names as $index => $name) {
                User::create([
                    'name' => $name,
                    'image' => $images[$index % count($images)],
                    'email' => strtolower($name) . '@' . strtolower($name),
                    'password' => encrypt('123456'),
                    'links' => rand(0, 1),
                    'instagram' => 'https://www.instagram.com/' . strtolower($name),
                    'facebook' => 'https://www.facebook.com/' . strtolower($name),
                    'twitter' => 'https://www.twitter.com/' . strtolower($name)
                ]);
            }
        }
    }
}
