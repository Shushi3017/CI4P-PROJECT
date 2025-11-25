<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BoardsSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $boards = [
            [
                'name'        => 'RPGs',
                'description' => 'Role-playing games with immersive worlds.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Action / Adventure',
                'description' => 'Fast-paced games with exciting stories.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Indie / Casual',
                'description' => 'Smaller games, often creative and casual.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Shooter / Multiplayer',
                'description' => 'FPS and multiplayer-focused games.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Puzzle / Strategy',
                'description' => 'Games that challenge your mind.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        $this->db->table('boards')->insertBatch($boards);
    }
}
