<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GamesSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $games = [
            [
                'board_id'     => 1,
                'name'         => 'Elden Ring',
                'description'  => 'Open-world fantasy action RPG by FromSoftware.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 1,
                'name'         => 'Horizon Forbidden West',
                'description'  => 'Post-apocalyptic action RPG with open world.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 2,
                'name'         => 'God of War (2018)',
                'description'  => 'Action-adventure game following Kratos and Atreus.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 2,
                'name'         => 'Spider-Man: Miles Morales',
                'description'  => 'Superhero action-adventure game by Insomniac Games.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 3,
                'name'         => 'Stardew Valley',
                'description'  => 'Farming simulation and RPG elements.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 3,
                'name'         => 'Hollow Knight',
                'description'  => 'Metroidvania action-adventure indie game.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 4,
                'name'         => 'Call of Duty: Modern Warfare II (2022)',
                'description'  => 'First-person shooter with multiplayer modes.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 4,
                'name'         => 'Valorant',
                'description'  => 'Team-based tactical first-person shooter.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 5,
                'name'         => 'Tetris Effect',
                'description'  => 'Modern twist on classic Tetris puzzle game.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 5,
                'name'         => 'Slay the Spire',
                'description'  => 'Deck-building roguelike strategy game.',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ];

        $this->db->table('games')->insertBatch($games);
    }
}
