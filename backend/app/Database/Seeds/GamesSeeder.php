<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GamesSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'name'         => 'Hollow Knight',
                'description'  => 'A beautiful hand-drawn metroidvania.',
                'image'        => 'https://store-images.s-microsoft.com/image/apps.24270.13847644057609868.a4a91f76-8d1c-4e19-aa78-f4d27d2818fb.d96146d7-d00a-4db9-ad68-197b2f962a17?q=90&w=480&h=270',
                'genre'        => 'Metroidvania',
                'platform'     => 'PC, Switch, PS4, Xbox',
                'release_year' => 2017,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'Minecraft',
                'description'  => 'Open world survival building game.',
                'image'        => 'https://media.indiedb.com/images/games/1/13/12771/7.jpg',
                'genre'        => 'Sandbox',
                'platform'     => 'PC, Mobile, Consoles',
                'release_year' => 2011,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'name'         => 'Valorant',
                'description'  => '5v5 tactical shooter.',
                'image'        => 'https://pbs.twimg.com/media/GT_VN9BXQAA28su.jpg',
                'genre'        => 'FPS',
                'platform'     => 'PC',
                'release_year' => 2020,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ];

        $this->db->table('games')->insertBatch($data);
    }
}
