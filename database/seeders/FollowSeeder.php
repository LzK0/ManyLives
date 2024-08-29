<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenha todos os IDs de usuários, exceto o usuário com ID 1
        $userIds = User::where('id', '!=', 1)->pluck('id');

        // Quantidade de seguidores que queremos para cada usuário
        $followDistribution = [
            1 => 20,  // Usuário com ID 1 terá 20 seguidores
            2 => 30,  // Usuário com ID 2 terá 30 seguidores
            3 => 10,  // Usuário com ID 3 terá 10 seguidores
            4 => 5,   // Usuário com ID 4 terá 5 seguidores
            // Adicione mais entradas conforme necessário
        ];

        // Crie follows para cada usuário de acordo com a distribuição
        foreach ($userIds as $userId) {
            // Verifica se há uma configuração específica para o número de seguidores deste usuário
            $numberOfFollowers = $followDistribution[$userId] ?? rand(5, 15); // Se não houver configuração, define um valor aleatório entre 5 e 15

            // Remova o próprio ID do array de IDs que ele pode seguir
            $possibleFollowerIds = $userIds->filter(function ($id) use ($userId) {
                return $id != $userId;
            });

            // Pegue um número aleatório de seguidores para este usuário
            $followersToCreate = $possibleFollowerIds->random(min($numberOfFollowers, $possibleFollowerIds->count()));

            foreach ($followersToCreate as $followerId) {
                Follow::create([
                    'id_followed' => $followerId,
                    'id_follower' => $userId,
                ]);
            }
        }
    }
}
