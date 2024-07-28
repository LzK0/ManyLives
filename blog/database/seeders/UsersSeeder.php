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
            'name' => 'Victor Silva',
            'image' => 'fixed/useroff.png',
            'email' => 'vs53307@gmail.com',
            'password' => '0102030405'
        ]);
        User::create([
            'name' => 'Ronaldinhho',
            'image' => 'teste.png',
            'email' => 'rnrn@gmail.com',
            'password' => '0102030405'
        ]);
        User::create([
            'name' => 'Marcos',
            'image' =>  'c.jpg',
            'email' => 'shsh@gmail.com',
            'password' => '0102030405'
        ]);
    }
}
