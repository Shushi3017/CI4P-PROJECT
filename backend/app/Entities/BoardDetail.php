<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class BoardDetail extends Entity
{
    protected $attributes = [
        'id'         => null,
        'board_id'   => null,
        'game_id'    => null,
        'created_at' => null,
        'deleted_at' => null,
    ];

    protected $dates = ['created_at', 'deleted_at'];
}
