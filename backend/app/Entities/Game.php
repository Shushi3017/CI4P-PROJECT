<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Game extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id'       => 'int',
        'board_id' => 'int',
        'name'     => 'string',
        'description' => 'string',
        'release_date' => 'date',
    ];
}
