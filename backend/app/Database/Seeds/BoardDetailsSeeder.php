<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BoardDetailSeeder extends Seeder
{
    public function run()
    {

        $now = date('Y-m-d H:i:s');


        $data = [
            [
                'board_id'   => 1,
                'game_id'    => 1,
                'created_at' => $now,
                'deleted_at' => null,
            ],
            [
                'board_id'   => 1,
                'game_id'    => 2,
                'created_at' => $now,
                'deleted_at' => null,
            ],
            [
                'board_id'   => 2,
                'game_id'    => 1,
                'created_at' => $now,
                'deleted_at' => null,
            ],
        ];

        // Insert multiple rows
        $this->db->table('boarddetail')->insertBatch($data);
    }
}
