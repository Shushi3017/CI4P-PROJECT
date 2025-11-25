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
                'release_date' => '2022-02-25',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 1,
                'name'         => 'Horizon Forbidden West',
                'description'  => 'Post-apocalyptic action RPG with open world.',
                'release_date' => '2022-02-18',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 2,
                'name'         => 'God of War (2018)',
                'description'  => 'Action-adventure game following Kratos and Atreus.',
                'release_date' => '2018-04-20',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 2,
                'name'         => 'Spider-Man: Miles Morales',
                'description'  => 'Superhero action-adventure game by Insomniac Games.',
                'release_date' => '2020-11-12',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 3,
                'name'         => 'Stardew Valley',
                'description'  => 'Farming simulation and RPG elements.',
                'release_date' => '2016-02-26',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 3,
                'name'         => 'Hollow Knight',
                'description'  => 'Metroidvania action-adventure indie game.',
                'release_date' => '2017-02-24',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 4,
                'name'         => 'Call of Duty: Modern Warfare II (2022)',
                'description'  => 'First-person shooter with multiplayer modes.',
                'release_date' => '2022-10-28',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 4,
                'name'         => 'Valorant',
                'description'  => 'Team-based tactical first-person shooter.',
                'release_date' => '2020-06-02',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],

            [
                'board_id'     => 5,
                'name'         => 'Tetris Effect',
                'description'  => 'Modern twist on classic Tetris puzzle game.',
                'release_date' => '2018-11-09',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'board_id'     => 5,
                'name'         => 'Slay the Spire',
                'description'  => 'Deck-building roguelike strategy game.',
                'release_date' => '2019-01-23',
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ];

        $this->db->table('games')->insertBatch($games);
    }
}
