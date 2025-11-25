<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Game extends Entity
{
    protected $attributes = [
        'id'            => null,
        'board_id'      => null,
        'name'          => null,
        'description'   => null,
        'genre'         => null,
        'platform'      => null,
        'created_at'    => null,
        'updated_at'    => null,
    ];

    protected $dates = [ 'created_at', 'updated_at'];
}
